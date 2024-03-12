<?php

function generationEntete(string $titre): string
{
  // Voir pour le traitement si besoins des chaines
  return '<div class="py-5 text-center">
                <h1 class="display-5">'.$titre.'</h1>
          </div>';
}