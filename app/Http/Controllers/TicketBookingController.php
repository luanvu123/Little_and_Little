<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Package;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankYouEmail;

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
        $packageName = session('package');
        $date = session('date');
        $fullname = session('fullname');
        $phone = session('phone');
        $email = session('email');
        $number = session('number');

        if (!$packageName || !$date || !$fullname || !$phone || !$email || !$number) {
            return redirect()->route('homepage')->with('error', 'Vui lòng nhập đầy đủ thông tin để đặt vé.');
        }
        $product_id = $request->input('product_id');
        $num_product = $request->input('num_product');
        $detail = Event::find($product_id);
        $product_price = $detail->price;
        $total_price_event = $product_price * $num_product;

        $total_prices = session()->get('total_prices', []);
        $total_prices[] = $total_price_event;
        session()->put('total_prices', $total_prices);
        //
        $event_id = $request->input('product_id');
        $event_price = $detail->price;
        $event_title = $detail->title;

        $events = session()->get('events', []);
        $events[] = [
            'id' => $event_id,
            'title' => $event_title,
            'price' => $event_price,
            'quantity' => $num_product,
        ];
        session()->put('events', $events);


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


        // if (session()->has('events')) {
        //     $events = session('events');
        //     if (is_array($events)) {
        //         foreach ($events as $event) {
        //             $event_price = $event['price'];
        //             $event_quantity = $event['quantity'];
        //             $totalPrice += $event_price * $event_quantity;
        //         }
        //     }
        // }
        session()->put('package', $packageName);
        session()->put('date', $date);
        session()->put('fullname', $fullname);
        session()->put('phone', $phone);
        session()->put('email', $email);
        session()->put('number', $number);
        session()->flash('total_price_event', $totalPrice);

        return view('pages.payment', compact('packageName', 'date', 'fullname', 'phone', 'email', 'number', 'totalPrice'));
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
        $ipnUrl = "http://127.0.0.1:8000/thanh-toan";
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



        return redirect()->to($jsonResult['payUrl']);
    }



    public function result(Request $request)
    {
        // Lấy thông tin từ session
        $number = session()->get('number');
        $date = session()->get('date');
        $fullname = session()->get('fullname');
        $phone = session()->get('phone');
        $email = session()->get('email');
        $packageName = session()->get('package');
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

        if ($request->query()) {
            $partnerCode = $request->query('partnerCode');
            $orderId = $request->query('orderId');
            $orderInfo = utf8_encode($request->query('orderInfo'));
            $amount = $request->query('amount');
            $requestId = $request->query('requestId');
            $extraData = $request->query('extraData');
            $rawHash = "partnerCode=" . $partnerCode . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&extraData=" . $extraData;
            $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);
            $events = session()->get('events', []);
            echo "<script>console.log('Debug huhu Objects: " . $rawHash . "' );</script>";
            echo "<script>console.log('Debug huhu Objects: " . $secretKey . "' );</script>";
            echo "<script>console.log('Debug huhu Objects: " . $partnerSignature . "' );</script>";


                if ($_GET["resultCode"] == '0') {
                    if (Order::where('order_id', $orderId)->exists()) {
                        return redirect()->route('payment');
                    } else {
                        $order = new Order();
                        $order->order_id = $orderId;
                        $order->order_info = $orderInfo;
                        $order->number = $number;
                        $order->date = $date;
                        $order->amount = $amount;
                        $order->fullname = $fullname;
                        $order->phone = $phone;
                        $order->email = $email;
                        $order->package_name = $packageName;
                        $order->event_data = json_encode($events);



                        // Tạo chuỗi JSON từ thông tin khách hàng
                        $customerInfo = json_encode([
                            'orderId' => $orderId,
                            'amount' => $amount,
                            'package' => $packageName,
                            'fullname' => $fullname,
                            'phone' => $phone,
                            'email' => $email,
                            'date' => $date,
                        ]);

                        // Tạo mã QR từ chuỗi JSON
                        $qrCodePath = 'qrcodes/' . $orderId . '.png';
                        QrCode::format('png')->size(200)->generate($customerInfo, public_path($qrCodePath));





                        // Lưu đường dẫn ảnh QR code vào cột qr_code trong bảng Order
                        $order->qr_code = $qrCodePath;
                        $order->save();

                        // Lưu thông tin vào session
                        session()->put('orderId', $orderId);
                        session()->put('amount', $amount);

                        // Gửi email cảm ơn
                        // $this->sendThankYouEmail();



                    }
                } else {
                    return redirect()->route('payment');
                }
           
        }



        return view('pages.success', compact('partnerCode', 'orderId', 'orderInfo', 'requestId', 'extraData', 'amount', 'number', 'date', 'packageName', 'fullname', 'phone', 'email'));
    }


    public function charge(Request $request)
    {

        $data = $request->all();
        $code_cart = rand(00, 9999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/thanh-toan-vnpay-thanh-cong";
        $vnp_TmnCode = "5DK93HQO"; //Mã website tại VNPAY
        $vnp_HashSecret = "SDFVNVGBWBGQOUQGAYAROOQHJUNRZPZA"; //Chuỗi bí mật

        $vnp_TxnRef = $code_cart; //Mã đơn hàng
        $vnp_OrderInfo = 'Thanh toán qua vnpay';
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

    public function result_vnpay(Request $request)
    {
        $vnp_HashSecret = "SDFVNVGBWBGQOUQGAYAROOQHJUNRZPZA";
        $number = session()->get('number');
        $date = session()->get('date');
        $fullname = session()->get('fullname');
        $phone = session()->get('phone');
        $email = session()->get('email');
        $packageName = session()->get('package');
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $inputData = array();
        $returnData = array();

        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $vnp_OrderInfo = $inputData['vnp_OrderInfo'];
        $vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
        $vnp_BankCode = $inputData['vnp_BankCode']; //Ngân hàng thanh toán
        $vnp_Amount = $inputData['vnp_Amount'] / 100; // Số tiền thanh toán VNPAY phản hồi
        $orderId = $inputData['vnp_TxnRef'];
        $Status = 0;


        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                if ($request->query()) {
                    $events = session()->get('events', []);

                    // Lưu thông tin vào cơ sở dữ liệu

                    if (Order::where('order_id', $orderId)->exists()) {
                        return redirect()->route('payment');
                    } else {
                        $order = new Order();
                        $order->order_id = $orderId;
                        $order->order_info = $vnp_OrderInfo;
                        $order->number = $number;
                        $order->date = $date;
                        $order->amount = $vnp_Amount;
                        $order->fullname = $fullname;
                        $order->phone = $phone;
                        $order->email = $email;
                        $order->package_name = $packageName;
                        $order->event_data = json_encode($events);


                        //
                        // Tạo chuỗi JSON từ thông tin khách hàng
                        $customerInfo = json_encode([
                            'orderId' => $orderId,
                            'amount' => $vnp_Amount,
                            'package' => $packageName,
                            'fullname' => $fullname,
                            'phone' => $phone,
                            'email' => $email,
                            'date' => $date,
                        ]);

                        // Tạo mã QR từ chuỗi JSON
                        $qrCodePath = 'qrcodes/' . $orderId . '.png'; // Đường dẫn lưu ảnh QR code
                        QrCode::format('png')->size(200)->generate($customerInfo, public_path($qrCodePath));


                        // Lưu đường dẫn ảnh QR code vào cột qr_code trong bảng Order
                        $order->qr_code = $qrCodePath;
                        $order->save();
                        // Lưu thông tin vào session
                        session()->put('orderId', $orderId);
                        session()->put('amount', $vnp_Amount);

                        // Gửi email cảm ơn
                        // $this->sendThankYouEmail();
                    }
                }
                echo json_encode($returnData);
            } else {
                return redirect()->route('payment');
            }
        } else {
            return redirect()->route('payment');
        }
        return view('pages.success', compact('orderId', 'vnp_Amount', 'vnp_BankCode', 'vnpTranId', 'number', 'date', 'packageName', 'fullname', 'phone', 'email'));
    }


    public function sendThankYouEmail()
    {
        $email = session()->get('email');
        $orderId = session()->get('orderId');
        $amount = session()->get('amount');


        Mail::to($email)->send(new ThankYouEmail($orderId, $amount));

        return response()->json(['success' => true]);
    }
    public function create()
    {
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
    }
}
