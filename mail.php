<!DOCTYPE html>
   <html lang="ja">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php

mb_language("ja");
mb_internal_encoding("UTF-8");

$request_param = $_POST;

$request_datetime = date("Y年m月d日 H時i分s秒");


$mailto = $request_param['email'];
$to = "yam.chiemi@gmail.com";
$mailfrom = "yam.chiemi@gmail.com";
$subject = "ご連絡ありがとうございます。";

$content = "";
$content .= $request_param['name']. "様\r\n";
$content .= "ご連絡ありがとうございます。\r\n";
$content .= "=================================\r\n";
$content .= "お名前 " . htmlspecialchars($request_param['name'])."\r\n";
$content .= "会社名 " . htmlspecialchars($request_param['company'])."\r\n";
$content .= "メールアドレス " . htmlspecialchars($request_param['email'])."\r\n";
$content .= "お問い合わせ内容 " . htmlspecialchars($request_param['content'])."\r\n";
$content .= "お問い合わせ日時 " . $request_datetime."\r\n";
$content .= "=================================\r\n";

//管理者確認用メール
$subject2 = "お問い合わせがありました。";
$content2 = "";
$content2 .= "お問い合わせがありました。\r\n";
$content2 .= "=================================\r\n";
$content2 .= "お名前 " . htmlspecialchars($request_param['name'])."\r\n";
$content2 .= "会社名 " . htmlspecialchars($request_param['company'])."\r\n";
$content2 .= "メールアドレス " . htmlspecialchars($request_param['email'])."\r\n";
$content2 .= "お問い合わせ内容 " . htmlspecialchars($request_param['content'])."\r\n";
$content2 .= "お問い合わせ日時   " . $request_datetime."\r\n";
$content2 .= "================================="."\r\n";


//mail 送信

if(mb_send_mail($to, $subject2,header('Content-Type: text/html; charset=UTF-8'),$content2)){
   mb_send_mail($mailto,$subject,header('Content-Type: text/html; charset=UTF-8'),$content);
   ?>
   <script>
       window.location = "http://www.yama-chi.sakura.ne.jp/wd/thanks";
   </script>
   <?php
} else {
   header('Content-Type: text/html; charset=UTF-8');
   echo "メールの送信に失敗しました";
};

?>
</body>
</html>