<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Package;
use App\Models\Event;



class TicketBookingController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function submit_Booking_Form(Request $request)
    {
        // Lưu thông tin người dùng vào session
        session()->put('package', $request->input('package'));
        session()->put('date', $request->input('date'));
        session()->put('fullname', $request->input('fullname'));
        session()->put('phone', $request->input('phone'));
        session()->put('email', $request->input('email'));
        session()->put('number', $request->input('number'));

        return redirect()->route('payment');
    }

    public function submit_Form(Request $request)
    {
        $product_id = $request->input('product_id');
        $num_product = $request->input('num_product');
        $detail = Event::find($product_id);
        $product_price = $detail->price;
        $total_price_event = $product_price * $num_product;
        $request->session()->put('total_price_event', $total_price_event);
        return redirect()->route('payment');
    }


    public function showBookingForm()
    {
        $packageName = session('package');
        $date = session('date');
        $fullname = session('fullname');
        $phone = session('phone');
        $email = session('email');
        $number = session('number');


        session()->put('number', $number);
        session()->put('date', $date);
        if (!$packageName || !$date || !$fullname || !$phone || !$email || !$number) {
            return redirect()->route('homepage')->with('error', 'Vui lòng nhập đầy đủ thông tin để đặt vé.');
        }

        if ($number <= 0) {
            return redirect()->route('homepage')->with('error', 'Số lượng vé phải lớn hơn 0.');
        }

        $package = Package::where('name_package', $packageName)->first();
        if (!$package) {
            return redirect()->route('homepage')->with('error', 'Gói cước không tồn tại.');
        }

        $totalPrice = $package->price_package * $number;

        if (session()->has('total_price_event')) {
            $totalPrice += session('total_price_event');
        }

         session()->flash('total_price_event', $totalPrice);

        return view('pages.payment', compact('packageName', 'date', 'fullname', 'phone', 'email', 'number', 'totalPrice'));
    }



    public function charge(Request $request)
    {
        $data = $request->all();
        $code_cart = rand(00, 9999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/thanh-toan-thanh-cong";
        $vnp_TmnCode = "5DK93HQO"; //Mã website tại VNPAY
        $vnp_HashSecret = "SDFVNVGBWBGQOUQGAYAROOQHJUNRZPZA"; //Chuỗi bí mật

        $vnp_TxnRef = $code_cart;
        $vnp_OrderInfo = 'Thanh toán vé';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $data['total_vnpay'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
            // "vnp_ExpireDate" => $vnp_ExpireDate,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }


    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function charge_momo(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $_POST['total_momo'];
        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000/thanh-toan-thanh-cong";
        $ipnUrl = "http://127.0.0.1:8000/thanh-toan-thanh-cong";
        $extraData = "";




        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature

        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true); // decode json

        //Just a example, please check more in there

        return redirect()->to($jsonResult['payUrl']);
        // header('Location: ' . $jsonResult['payUrl']);

    }
    public function result()
    {
        $number = session()->get('number');
        $date = session()->get('date');
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        if (!empty($_GET)) {
            $partnerCode = $_GET["partnerCode"];
            $orderId = $_GET["orderId"];
            $orderInfo = utf8_encode($_GET["orderInfo"]);
            $amount = $_GET["amount"];
            $requestId = $_GET["requestId"];
            $extraData = $_GET["extraData"];
            $rawHash = "partnerCode=" . $partnerCode . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&extraData=" . $extraData;
            $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);
            echo "<script>console.log('Debug huhu Objects: " . $rawHash . "' );</script>";
            echo "<script>console.log('Debug huhu Objects: " . $secretKey . "' );</script>";
            echo "<script>console.log('Debug huhu Objects: " . $partnerSignature . "' );</script>";
        }
        return view('pages.success', compact('partnerCode', 'orderId', 'orderInfo', 'requestId', 'extraData', 'amount', 'number', 'date'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
