<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EEEP Walter Ramos de Araújo</title>
    <link rel="icon" href="<?= base_url('img/logo_WR.png') ?>" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #3b8540;
            --primary-green-hover: #2c6b30;
            --dark-green: #2e5343;
            --bg-light: #f4f7f6;
            --text-dark: #2d3748;
            --text-gray: #718096;
            --input-border: #e2e8f0;
            --error-bg: #fff5f5;
            --error-border: #fed7d7;
            --error-text: #c53030;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Roboto, sans-serif; }

        body {
            background-color: var(--bg-light);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 24px;
            color: var(--text-dark);
        }

        /* CARTÃO PRINCIPAL (2 PAINÉIS) */
        .login-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            max-width: 900px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
        }

        /* PAINEL ESQUERDO (IDENTIDADE) */
        .brand-panel {
            background: linear-gradient(160deg, var(--dark-green) 0%, var(--primary-green) 100%);
            color: white;
            padding: 48px 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }
        .brand-panel::before,
        .brand-panel::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
        }
        .brand-panel::before { width: 260px; height: 260px; top: -90px; right: -90px; }
        .brand-panel::after { width: 200px; height: 200px; bottom: -70px; left: -70px; }
        .brand-content { position: relative; z-index: 1; }

        .logo-container {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border: 4px solid rgba(255, 255, 255, 0.35);
            margin-bottom: 28px;
        }
        .logo-container img { width: 100%; height: 100%; object-fit: cover; }

        .brand-panel h2 { font-size: 26px; line-height: 1.25; font-weight: 700; margin-bottom: 12px; }
        .brand-panel .brand-desc { font-size: 15px; line-height: 1.6; color: rgba(255, 255, 255, 0.85); }
        .brand-footer { position: relative; z-index: 1; font-size: 12px; color: rgba(255, 255, 255, 0.65); }

        /* PAINEL DIREITO (FORMULÁRIO) */
        .form-panel {
            padding: 48px 44px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-panel h1 { font-size: 26px; color: var(--text-dark); font-weight: 700; margin-bottom: 6px; }
        .form-panel p.subtitle { color: var(--text-gray); font-size: 15px; margin-bottom: 28px; }

        /* ALERTA DE ERRO */
        .alert-error {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: var(--error-text);
            background-color: var(--error-bg);
            border: 1px solid var(--error-border);
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.4;
        }
        .alert-error i { margin-top: 2px; }

        /* CAMPOS */
        .field { margin-bottom: 20px; }
        .field label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }
        .input-group { position: relative; }
        .input-group .icon-left {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-green);
            font-size: 15px;
            pointer-events: none;
        }
        .input-group .icon-right {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
            font-size: 12px;
            pointer-events: none;
        }

        select,
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 14px 44px;
            border-radius: 10px;
            border: 1.5px solid var(--input-border);
            background-color: #fff;
            font-size: 15px;
            color: var(--text-dark);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        select { appearance: none; -webkit-appearance: none; cursor: pointer; }
        select:invalid { color: #a0aec0; }
        select option { color: var(--text-dark); }
        input::placeholder { color: #a0aec0; }
        select:hover,
        input:hover { border-color: #cbd5e0; }
        select:focus,
        input:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 4px rgba(59, 133, 64, 0.12);
        }
        select:disabled { background-color: #f7fafc; cursor: not-allowed; opacity: 0.7; }

        /* BOTÃO MOSTRAR SENHA */
        .toggle-senha {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border: none;
            background: transparent;
            border-radius: 8px;
            color: var(--text-gray);
            cursor: pointer;
            transition: color 0.2s, background-color 0.2s;
        }
        .toggle-senha:hover { color: var(--primary-green); background-color: rgba(59, 133, 64, 0.08); }
        .toggle-senha:focus-visible { outline: 2px solid var(--primary-green); }

        /* AVISO CAPS LOCK */
        .caps-aviso {
            display: none;
            margin-top: 8px;
            font-size: 12.5px;
            color: #b7791f;
            align-items: center;
            gap: 6px;
        }
        .caps-aviso.visivel { display: flex; }

        /* BOTÃO ENTRAR */
        .btn-submit {
            width: 100%;
            margin-top: 6px;
            background-color: var(--primary-green);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            transition: background-color 0.2s, box-shadow 0.2s, transform 0.1s;
        }
        .btn-submit:hover { background-color: var(--primary-green-hover); box-shadow: 0 6px 16px rgba(59, 133, 64, 0.25); }
        .btn-submit:active { transform: translateY(1px); }
        .btn-submit:disabled { opacity: 0.75; cursor: wait; box-shadow: none; }

        .form-footer {
            margin-top: 28px;
            padding-top: 18px;
            border-top: 1px solid #edf2f7;
            text-align: center;
            font-size: 12.5px;
            color: var(--text-gray);
        }

        /* RESPONSIVO */
        @media (max-width: 820px) {
            body { padding: 0; align-items: stretch; background: white; }
            .login-wrapper {
                grid-template-columns: 1fr;
                max-width: none;
                border-radius: 0;
                box-shadow: none;
                grid-template-rows: auto 1fr;
            }
            .brand-panel {
                flex-direction: row;
                align-items: center;
                justify-content: flex-start;
                gap: 16px;
                padding: 24px 22px;
            }
            .brand-panel::before, .brand-panel::after { display: none; }
            .brand-content { display: flex; align-items: center; gap: 16px; }
            .logo-container { width: 60px; height: 60px; margin-bottom: 0; border-width: 3px; flex-shrink: 0; }
            .brand-panel h2 { font-size: 17px; margin-bottom: 0; }
            .brand-panel .brand-desc,
            .brand-footer { display: none; }
            .form-panel { padding: 32px 22px; }
        }
    </style>
</head>
<body>

    <div class="login-wrapper">

        <!-- PAINEL DA ESCOLA -->
        <aside class="brand-panel">
            <div class="brand-content">
                <div class="logo-container">
                    <img src="<?= base_url('img/logo.png.jpeg') ?>" alt="Logo da escola">
                </div>
                <div>
                    <h2>EEEP Walter Ramos de Araújo</h2>
                    <p class="brand-desc">Sistema de controle de frequência escolar. Acesse para registrar e acompanhar a presença dos alunos.</p>
                </div>
            </div>
            <div class="brand-footer">&copy; <?= date('Y') ?> EEEP Walter Ramos de Araújo</div>
        </aside>

        <!-- PAINEL DO FORMULÁRIO -->
        <main class="form-panel">
            <h1>Bem-vindo(a)!</h1>
            <p class="subtitle">Faça login para continuar</p>

            <!-- Exibe mensagem de erro se a senha/turma estiver errada -->
            <?php if (session()->getFlashdata('erro')): ?>
                <div class="alert-error" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span><?= session()->getFlashdata('erro') ?></span>
                </div>
            <?php endif; ?>

            <form id="loginForm" action="<?= base_url('login/processar') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="field">
                    <label for="turma">Cargo</label>
                    <div class="input-group">
                        <i class="fa-solid fa-users icon-left"></i>
                        <select id="turma" name="turma" disabled required>
                            <option value="" disabled selected>Carregando opções...</option>
                        </select>
                        <i class="fa-solid fa-chevron-down icon-right"></i>
                    </div>
                </div>

                <div class="field">
                    <label for="senha">Senha</label>
                    <div class="input-group">
                        <i class="fa-solid fa-lock icon-left"></i>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" autocomplete="current-password" required>
                        <button type="button" class="toggle-senha" id="toggleSenha" aria-label="Mostrar senha" title="Mostrar senha">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    <div class="caps-aviso" id="capsAviso">
                        <i class="fa-solid fa-triangle-exclamation"></i> Caps Lock está ativado
                    </div>
                </div>

                <button type="submit" class="btn-submit" id="btnEntrar">
                    <span>Entrar</span>
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </button>
            </form>

            <div class="form-footer">
                Em caso de problemas de acesso, procure a gestão da escola.
            </div>
        </main>
    </div>

    <script>
        // Mostrar / ocultar senha
        const campoSenha = document.getElementById('senha');
        const botaoOlho = document.getElementById('toggleSenha');

        botaoOlho.addEventListener('click', function () {
            const icone = botaoOlho.querySelector('i');
            const mostrando = campoSenha.type === 'text';

            campoSenha.type = mostrando ? 'password' : 'text';
            icone.classList.toggle('fa-eye', mostrando);
            icone.classList.toggle('fa-eye-slash', !mostrando);

            const texto = mostrando ? 'Mostrar senha' : 'Ocultar senha';
            botaoOlho.setAttribute('aria-label', texto);
            botaoOlho.setAttribute('title', texto);
        });

        // Aviso de Caps Lock
        const capsAviso = document.getElementById('capsAviso');
        function verificarCaps(e) {
            if (typeof e.getModifierState === 'function') {
                capsAviso.classList.toggle('visivel', e.getModifierState('CapsLock'));
            }
        }
        campoSenha.addEventListener('keydown', verificarCaps);
        campoSenha.addEventListener('keyup', verificarCaps);
        campoSenha.addEventListener('blur', function () { capsAviso.classList.remove('visivel'); });

        // Recebe o array $turmas_db enviado do Controller Login::index
        const dadosBanco = <?= json_encode($turmas_db ?? [], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
        const selectTurma = document.getElementById('turma');

        selectTurma.disabled = false;
        selectTurma.innerHTML = '<option value="" disabled selected>Selecionar Cargo</option>';

        // Preenche o campo select com os dados vindos do banco
        dadosBanco.forEach(function (turma) {
            const opcao = document.createElement('option');
            opcao.value = turma.id;
            opcao.textContent = turma.nome;
            selectTurma.appendChild(opcao);
        });

        // Estado de carregamento ao enviar
        const formLogin = document.getElementById('loginForm');
        const btnEntrar = document.getElementById('btnEntrar');

        formLogin.addEventListener('submit', function () {
            btnEntrar.disabled = true;
            btnEntrar.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i><span>Entrando...</span>';
        });

        // Se o usuário voltar pelo botão "voltar" do navegador, restaura o botão
        window.addEventListener('pageshow', function (e) {
            if (e.persisted) {
                btnEntrar.disabled = false;
                btnEntrar.innerHTML = '<span>Entrar</span><i class="fa-solid fa-arrow-right-to-bracket"></i>';
            }
        });
    </script>
</body>
</html>