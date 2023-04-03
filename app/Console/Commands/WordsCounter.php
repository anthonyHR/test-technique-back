<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WordsCounter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:words-counter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commande qui va compter le nombre de mots dans une fichier texte';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $path = storage_path('app/public/test.txt');

        if (file_exists($path)) {
            $file = fopen($path, 'r');
            $content = fread($file, filesize($path));
            $wordCount = str_word_count($content);
            fclose($file);
            echo "Le fichier $path contient $wordCount mots.";
        }
        else {
            dd('No file');
        }
    }
}
