<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Models\NotesModel;
use App\View\View;

class NotesController extends AbstractController
{
    public function notesRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $this->paramView['category'] = $this->category();

            $viewNotes = new NotesModel();

            if ($result = $viewNotes->viewNotes((int) $_SESSION['userId'])) {
                $this->paramView['note'] = $result;
            }

            (new View())->viewer("notes", $this->paramView);
        } else {
            $this->forwarding("/login");
        }
    }

    public function postNote(): Void
    {
        $viewNotes = new NotesModel();

        $data = [
            'title' => trim($_POST['titleNote']),
            'description' => trim($_POST['descriptionNote']),
        ];

        if (empty($data['title'])) {
            $_SESSION["error"] = "Brak tytułu notatki";
            $this->forwarding("/notes");
        }

        if (!preg_match('/^[a-zA-Z0-9ĄĆĘŁŃÓŚŹŻąćęłńóśźż ]+$/u', $data['title'])) {
            $_SESSION["error"] = "Zakazane znaki w tytule notatki";
            $this->forwarding("/notes");
        }

        if (strlen($data['title']) > 50) {
            $_SESSION["error"] = "Zbyt długi tytuł notatki";
            $this->forwarding("/notes");
        }

        $data['userId'] = $_SESSION['userId'];


        if ($viewNotes->addNote($data)) {
            $_SESSION["error"] = "Notatka została dodana";
            $this->forwarding("/notes");
        } else {
            $_SESSION["error"] = "Notatka nie została dodana";
            $this->forwarding("/notes");
        }
    }
}
