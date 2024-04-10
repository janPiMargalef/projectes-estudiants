<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $projectName;
    public $inviterName;
    public $projectId;
    public $userId;

    public function __construct($projectName, $inviterName, $projectId, $userId)
    {
        $this->projectName = $projectName;
        $this->inviterName = $inviterName;
        $this->projectId = $projectId;
        $this->userId = $userId;
    }

    public function build()
    {
        return $this->subject('Invitación al Proyecto: ' . $this->projectName)
                    ->view('emails.project_invitation')
                    ->with([
                        'projectName' => $this->projectName,
                        'inviterName' => $this->inviterName,
                        'userId' => $this->userId,
                        'projectId' => $this->projectId,
                    ]);
    }
}
