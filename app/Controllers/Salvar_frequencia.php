<?php

namespace App\Controllers;

use App\Models\FrequenciaModel;

class Salvar_frequencia extends BaseController
{
    public function salvar()
    {
        // Recupera os dados enviados pelo formulário
        $dataRegistro = $this->request->getPost('data_registro');
        $frequencias = $this->request->getPost('freq');
        $turmaId = $this->request->getPost('turma_id');

        // Verifica se os dados foram recebidos
        if (empty($dataRegistro) || empty($frequencias)) {
            return redirect()->to('/dashboard')
                ->with('erro', 'Nenhuma frequência foi recebida.');
        }

        $model = new FrequenciaModel();

        foreach ($frequencias as $alunoId => $aulas) {

            $dados = [
                'aluno_id'      => $alunoId,
                'data_registro' => $dataRegistro,
                'aula_1'        => $aulas[1] ?? 'P',
            ];

            $registro = $model
                ->where('aluno_id', $alunoId)
                ->where('data_registro', $dataRegistro)
                ->first();

            if ($registro) {
                $resultado = $model->update($registro['id'], $dados);
                $operacao = 'UPDATE';
            } else {
                $resultado = $model->insert($dados);
                $operacao = 'INSERT';
            }

            if ($resultado === false) {
                dd([
                    'erro' => true,
                    'operacao' => $operacao,
                    'dados_enviados' => $dados,
                    'erros_model' => $model->errors(),
                    'erro_banco' => $model->db->error(),
                ]);
            }
        }

        return redirect()->to(
    '/dashboard?sucesso=1'
    . '&data_busca=' . urlencode($dataRegistro)
    . '&turma_busca=' . urlencode($turmaId)
);
    }
}
