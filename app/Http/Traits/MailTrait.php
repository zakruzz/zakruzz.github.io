<?php


namespace App\Http\Traits;


use Illuminate\Support\Facades\Mail;

trait MailTrait{

    private $email = 'info@infestits.id';

    private function sendMail($view, $data, $subject, $to_name, $to_email){

        try {
            Mail::send($view, $data, function($message) use ($subject, $to_name, $to_email) {
                $message->to($to_email, $to_name)->subject($subject);
                $message->from($this->email, 'Instrumentation Festival 2022');
            });
        }catch (\Exception $e){
            return $e->getMessage();
        }

        return 'success';

    }

    public function testMail(){

        $to_name = 'Edward Christanto';
        $to_email = 'edwardch197@gmail.com';
        $view = 'emails.mail';

        $data = [
            "name" => "Test",
            "subject" => "Test",
            "content" => "Ini deskripsi test"
        ];

        return $this->sendMail(
            $view, $data, $data['subject'], $to_name, $to_email
        );

    }

    public function sendPassword($email, $name, $password){

        $to_name = $name;
        $to_email = $email;
        $view = 'emails.password';

        $data = [
            "name" => $name,
            "subject" => "Kredensial Akun INFEST 2022",
            "email" => $email,
            "password" => $password
        ];

        return $this->sendMail(
            $view, $data, $data['subject'], $to_name, $to_email
        );

    }

    public function sendMailGreeting($data){

        $view = 'emails.greeting';

        return $this->sendMail(
            $view,
            $data,
            $data['subject'],
            $data['to_name'],
            $data['to_email']
        );

    }

    public function sendMailInvitationTeam($data){

        $view = 'emails.invitation-team';

        return $this->sendMail(
            $view,
            $data,
            $data['subject'],
            $data['to_name'],
            $data['to_email']
        );

    }

}
