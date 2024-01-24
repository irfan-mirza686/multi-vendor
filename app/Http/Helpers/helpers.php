<?php

use App\Models\EmailTemplate;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


/****************************************************************************/
function variableReplacer($code, $value, $template)
{
    return str_replace($code, $value, $template);
}

function sendGeneralMail($data,$attachments=null){
    $general = GeneralSetting::first();

    // echo "<pre>"; print_r($emailsMerge); exit();
    if ($general->email_method == 'php') {
        $headers = "From: $general->sitename <$general->email_from> \r\n";
        $headers .= "Reply-To: $general->sitename <$general->email_from> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        @mail($data['email'], $data['subject'], $message, $headers);
    }
    else {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = $general->smtp_config->smtp_host;
            $mail->SMTPAuth   = true;
            $mail->Username   = $general->smtp_config->smtp_username;
            $mail->Password   = $general->smtp_config->smtp_password;
            if ($general->smtp_config->smtp_encryption == 'ssl') {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            } else {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            }
            $mail->Port       = $general->smtp_config->smtp_port;
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($general->email_from, $general->sitename);
            $mail->addAddress($data['email'], $general->sitename);
        
            $mail->addReplyTo($general->email_from, $general->sitename);
          $mail->isHTML(true);
          $mail->Subject = $data['subject'];
         
          $mail->Body    = $data['message'];
          if ($attachments) {
                foreach ($attachments as $key => $document) {
                    $mail->AddAttachment($document);
                }
            }
          $mail->send();
      } catch (Exception $e) {
        return redirect(route('user.dashboard'))->with('error','Oops, Email is not Sent!');
    }
}
}
/****************************************************************************/

function sendMail($key, array $data=null, $user=null ,$documents=null)
{
    $companyDetail = CompanyDetail::first();
    // echo "<pre>"; print_r($data); exit();
    $general = GeneralSetting::first();
    
  
    $template =  EmailTemplate::where('name', $key)->first();

    $message = variableReplacer('{username}', $user->company_name_eng, $template->template);
    $message = variableReplacer('{sent_from}', @$general->sitename, $message);

    foreach ($data as $key => $value) {
        $message = variableReplacer("{" . $key . "}", $value, $message);
    }
// echo "<pre>"; print_r($message); exit();
    if ($general->email_method == 'php') {
        // dd('php');
        $headers = "From: $general->sitename <$general->email_from> \r\n";
        $headers .= "Reply-To: $general->sitename <$general->email_from> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        foreach ($emailData as $key => $sent_email) {
          @mail($sent_email->email, $template->subject, $message, $headers);  
        }
    } else {
        // dd('php mailer');
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = $general->smtp_config->smtp_host;
            $mail->SMTPAuth   = true;
            $mail->Username   = $general->smtp_config->smtp_username;
            $mail->Password   = $general->smtp_config->smtp_password;
            if ($general->smtp_config->smtp_encryption == 'ssl') {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            } else {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            }
            $mail->Port       = $general->smtp_config->smtp_port;
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($general->email_from, $general->sitename);
           
            $mail->addAddress($user->email, $user->fname);
       
            $mail->addReplyTo($general->email_from, $general->sitename);
            $mail->isHTML(true);
            $mail->Subject = $template->subject;
            $mail->Body    = $message;
            if ($documents) {
                foreach ($documents as $key => $document) {
                    $mail->AddAttachment($document['pdfFullPath'], $document['fileName']);
                }
            }
            
            
            $mail->send();
        } catch (Exception $e) {
            return redirect(route('user.dashboard'))->with('error','Oops, Email is not Sent!');
        }
    }
}

/****************************************************************************/
// function uploadImage($image, $path, $old = null)
// {
//     // echo "<pre>"; print_r($image); exit();
//     $isDirectoryMade = makeDirectory($path);

//     if (!$isDirectoryMade) throw new Exception('Directory could not made');

//     $filename = uniqid() . time() . '.' . $image->getClientOriginalExtension();

    

//     if ($image->getClientOriginalExtension() == 'gif') {
//         copy($image->getRealPath(), $path . '/' . $filename);
//     } else {

//         $imageIntervention = Image::make($image);

//         if($imageIntervention->width() > 400){
//             // echo "<pre>"; print_r("size is greater than 500KB"); exit();
//             $imageIntervention->fit(400);
//         }else{
//             // echo "<pre>"; print_r("size is not greater than 500KB");  exit();
//             $imageIntervention->resize($imageIntervention->width(400,400), $imageIntervention->height(400,400));
//         }
//         // echo "<pre>"; print_r($imageIntervention); exit();
       
//         if ($old) {
//             @unlink($path . '/' . $old);
//         }

//         $imageIntervention->save($path . '/' . $filename);
//     }

//     return $filename;
// }

function getFile($folder_name, $filename)
{
    
    return asset('assets/uploads/'.$folder_name.'/'.$filename);
}
/**********************************************************/

function uploadImage($image, $path, $old = null)
{
    
    $isDirectoryMade = makeDirectory($path);

    if (!$isDirectoryMade) throw new Exception('Directory could not made');

    // $filename = uniqid() . time() . '.' . $image->getClientOriginalExtension();
    $filename = uniqid() . time();

    

    if ($image->getClientOriginalExtension() == 'gif') {
        copy($image->getRealPath(), $path . '/' . $filename);
    } else {

        // $imageIntervention = Image::make($image);
        $image = Image::make($image)->encode('webp', 90);

        if($image->width() > 400){
            $image->fit(400);
        }else{
            $image->resize($image->width(400,400), $image->height(400,400));
        }

       
        if ($old) {
            @unlink($path . '/' . $old);
        }

        $image->save($path . '/' . $filename . '.webp');
    }

    return $image->basename;
}

function uploadSlider($image, $path, $old = null)
{
    
    $isDirectoryMade = makeDirectory($path);

    if (!$isDirectoryMade) throw new Exception('Directory could not made');

    // $filename = uniqid() . time() . '.' . $image->getClientOriginalExtension();
    $filename = uniqid() . time();

    

    if ($image->getClientOriginalExtension() == 'gif') {
        copy($image->getRealPath(), $path . '/' . $filename);
    } else {

        // $imageIntervention = Image::make($image);
        $image = Image::make($image)->encode('webp', 90);

        if($image->width() > 1920){
            // $image->fit(1920);
            $image->resize($image->width(1920,1920), $image->height(600,600));
        }else{
            $image->resize($image->width(1920,1920), $image->height(600,600));
        }

       
        if ($old) {
            @unlink($path . '/' . $old);
        }

        $image->save($path . '/' . $filename . '.webp');
    }

    return $image->basename;
}
/****************************************************************************/
function makeDirectory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}
/****************************************************************************/

function filePath($folder_name)
{
    return public_path('assets/uploads/'.$folder_name);
}



