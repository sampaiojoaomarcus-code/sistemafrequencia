<?php

namespace App\Controllers;

use App\Models\JustificativafaltaModel;

class Arquivo extends BaseController
{
    public function atestado($id)
{
    $model = new \App\Models\JustificativafaltaModel();
    $justificativa = $model->find($id);

    if (!$justificativa || empty($justificativa['arquivo_caminho'])) {
        return $this->response
            ->setStatusCode(404)
            ->setBody('Atestado não encontrado no banco de dados.');
    }

    $caminhoCompleto = WRITEPATH . str_replace(
        ['/', '\\'],
        DIRECTORY_SEPARATOR,
        $justificativa['arquivo_caminho']
    );

    if (!is_file($caminhoCompleto)) {
        return $this->response
            ->setStatusCode(404)
            ->setBody('Arquivo físico não encontrado.');
    }

    return $this->response
        ->download(
            $caminhoCompleto,
            null,
            true
        )
        ->setFileName($justificativa['arquivo_nome'] ?? 'atestado.png');
}
}