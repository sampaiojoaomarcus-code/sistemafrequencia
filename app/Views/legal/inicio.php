<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EEEP Walter Ramos de Araújo</title>
    <link rel="icon" href="<?= base_url('img/logo_WR.png') ?>" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #3b8540;
            --primary-hover: #2c6b30;
            --dark-green: #2e5343;
            --bg-light: #f4f7f6;
            --text-dark: #2d3748;
            --text-gray: #718096;
            --border: #e2e8f0;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Roboto, sans-serif; }
        html { scroll-behavior: smooth; }
        body { background: var(--bg-light); color: var(--text-dark); }

        /* HEADER */
        .site-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--border);
        }
        .header-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 14px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo-area { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .logo-area img {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #c8e6c9;
        }
        .logo-area span { color: var(--dark-green); font-size: 18px; font-weight: 700; }

        .navbar { display: flex; align-items: center; gap: 8px; }
        .navbar a.link {
            text-decoration: none;
            color: var(--text-gray);
            font-size: 14px;
            font-weight: 600;
            padding: 9px 14px;
            border-radius: 8px;
            transition: .2s;
        }
        .navbar a.link:hover { color: var(--primary-green); background: #eef6ef; }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            padding: 12px 22px;
            border-radius: 10px;
            transition: background .2s, box-shadow .2s, transform .1s, color .2s;
        }
        .btn-primary { background: var(--primary-green); color: white; }
        .btn-primary:hover { background: var(--primary-hover); box-shadow: 0 6px 16px rgba(59, 133, 64, .25); }
        .btn-primary:active { transform: translateY(1px); }
        .btn-outline { border: 1.5px solid var(--primary-green); color: var(--primary-green); background: white; }
        .btn-outline:hover { background: #eef6ef; }
        .btn-light { background: white; color: var(--dark-green); }
        .btn-light:hover { background: #eef6ef; }

        /* HERO */
        .hero {
            background: linear-gradient(160deg, var(--dark-green) 0%, var(--primary-green) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }
        .hero::before, .hero::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
        }
        .hero::before { width: 420px; height: 420px; top: -160px; right: -120px; }
        .hero::after { width: 300px; height: 300px; bottom: -140px; left: -100px; }

        .hero-inner {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 24px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 56px;
            align-items: center;
        }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 7px 14px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 22px;
        }
        .hero-text h2 { font-size: 44px; line-height: 1.15; font-weight: 800; margin-bottom: 18px; }
        .hero-text p { font-size: 17px; line-height: 1.7; color: rgba(255, 255, 255, 0.85); margin-bottom: 32px; max-width: 520px; }
        .hero-buttons { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn-ghost { color: white; border: 1.5px solid rgba(255, 255, 255, 0.45); }
        .btn-ghost:hover { background: rgba(255, 255, 255, 0.12); }

        .info-card {
            background: white;
            color: var(--text-dark);
            border-radius: 20px;
            padding: 14px;
            box-shadow: 0 24px 50px rgba(0, 0, 0, 0.25);
        }
        .info-card img {
            display: block;
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-radius: 14px;
        }
        .info-card .info-body { padding: 20px 10px 10px; }
        .info-card h3 { color: var(--dark-green); font-size: 19px; margin-bottom: 8px; }
        .info-card p { color: var(--text-gray); font-size: 14.5px; line-height: 1.65; }

        /* FUNCIONALIDADES */
        .features { max-width: 1200px; margin: 0 auto; padding: 80px 24px 40px; }
        .section-title { text-align: center; margin-bottom: 48px; }
        .section-title span {
            color: var(--primary-green);
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }
        .section-title h2 { font-size: 32px; color: var(--dark-green); margin-top: 8px; }
        .section-title p { color: var(--text-gray); margin-top: 10px; font-size: 16px; }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 22px;
        }
        .feature-box {
            background: white;
            padding: 28px 26px;
            border-radius: 16px;
            border: 1px solid var(--border);
            transition: transform .25s, box-shadow .25s, border-color .25s;
        }
        .feature-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 30px rgba(0, 0, 0, 0.06);
            border-color: #c8e6c9;
        }
        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #e8f5e9;
            color: var(--primary-green);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            margin-bottom: 18px;
        }
        .feature-box h3 { font-size: 17px; margin-bottom: 8px; color: var(--text-dark); }
        .feature-box p { color: var(--text-gray); font-size: 14.5px; line-height: 1.65; }

        /* CHAMADA FINAL */
        .cta { max-width: 1200px; margin: 0 auto; padding: 40px 24px 20px; }
        .cta-box {
            background: linear-gradient(160deg, var(--dark-green) 0%, var(--primary-green) 100%);
            color: white;
            border-radius: 20px;
            padding: 44px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
        }
        .cta-box h2 { font-size: 26px; margin-bottom: 6px; }
        .cta-box p { color: rgba(255, 255, 255, 0.85); font-size: 15.5px; }

        /* RESPONSIVO */
        @media (max-width: 900px) {
            .hero-inner { grid-template-columns: 1fr; padding: 56px 22px; gap: 40px; text-align: center; }
            .hero-text p { margin-left: auto; margin-right: auto; }
            .hero-buttons { justify-content: center; }
            .hero-text h2 { font-size: 34px; }
            .info-card { max-width: 480px; margin: 0 auto; text-align: left; }
            .features { padding: 56px 22px 24px; }
            .cta { padding: 24px 22px 10px; }
            .cta-box { padding: 32px 26px; text-align: center; justify-content: center; }
        }
        @media (max-width: 520px) {
            .header-inner { padding: 12px 16px; }
            .logo-area span { font-size: 15px; }
            .navbar a.link { display: none; }
            .hero-text h2 { font-size: 29px; }
            .section-title h2 { font-size: 26px; }
        }
    </style>
</head>
<body>

    <header class="site-header">
        <div class="header-inner">
            <a href="<?= base_url() ?>" class="logo-area">
                <img src="<?= base_url('img/logo.png.jpeg') ?>" alt="Logo da escola">
                <span>EEEP Walter Ramos</span>
            </a>

            <nav class="navbar">
                <a href="#funcionalidades" class="link">Funcionalidades</a>
                <a href="<?= base_url('login') ?>" class="btn btn-primary">
                    <i class="fa-solid fa-right-to-bracket"></i> Entrar
                </a>
            </nav>
        </div>
    </header>

    <main>
        <!-- HERO -->
        <section class="hero">
            <div class="hero-inner">
                <div class="hero-text">
                    <div class="badge"><i class="fa-solid fa-graduation-cap"></i> Sistema Escolar</div>
                    <h2>Frequência escolar digital, simples e organizada</h2>
                    <p>
                        Plataforma desenvolvida para auxiliar professores e gestão escolar
                        no registro de presenças, nas justificativas de faltas e no
                        gerenciamento das turmas.
                    </p>
                    <div class="hero-buttons">
                        <a href="<?= base_url('login') ?>" class="btn btn-light">
                            <i class="fa-solid fa-right-to-bracket"></i> Acessar o sistema
                        </a>
                        <a href="#funcionalidades" class="btn btn-ghost">Conhecer</a>
                    </div>
                </div>

                <div class="info-card">
                    <img src="<?= base_url('img/escola.jpeg') ?>" alt="Fachada da escola">
                    <div class="info-body">
                        <h3>Educação + Tecnologia</h3>
                        <p>
                            Criado para modernizar o ambiente escolar e facilitar o acesso às
                            informações de forma rápida, segura e organizada.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FUNCIONALIDADES -->
        <section class="features" id="funcionalidades">
            <div class="section-title">
                <span>Funcionalidades</span>
                <h2>Tudo o que você precisa em um só lugar</h2>
                <p>Ferramentas pensadas para a rotina de professores e da gestão.</p>
            </div>

            <div class="features-grid">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa-solid fa-clipboard-user"></i></div>
                    <h3>Registro de frequência</h3>
                    <p>Lance a presença dos alunos por turma de forma rápida e sem papel.</p>
                </div>
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa-solid fa-table"></i></div>
                    <h3>Justificativas</h3>
                    <p>Acompanhe as justificativas de faltas em uma tabela clara e organizada.</p>
                </div>
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa-solid fa-users-gear"></i></div>
                    <h3>Gestão de turmas</h3>
                    <p>Adicione, remova e atualize alunos das turmas sempre que necessário.</p>
                </div>
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3>Acesso por perfil</h3>
                    <p>Cada usuário acessa apenas o que corresponde ao seu cargo, com mais segurança.</p>
                </div>
            </div>
        </section>

        <!-- CHAMADA FINAL -->
        <section class="cta">
            <div class="cta-box">
                <div>
                    <h2>Pronto para começar?</h2>
                    <p>Entre com o seu cargo e a sua senha para acessar o sistema.</p>
                </div>
                <a href="<?= base_url('login') ?>" class="btn btn-light">
                    <i class="fa-solid fa-right-to-bracket"></i> Entrar
                </a>
            </div>
        </section>
    </main>

    <?php include 'rodapelegal.php'; ?>

</body>
</html>