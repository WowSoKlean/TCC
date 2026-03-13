<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Lab - Sobre Nós</title>
    
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', 'Roboto', '"Helvetica Neue"', 'Arial', '"Noto Sans"', 'sans-serif', '"Apple Color Emoji"', '"Segoe UI Emoji"', '"Segoe UI Symbol"', '"Noto Color Emoji"'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-[#020617] text-slate-300 antialiased selection:bg-blue-500 selection:text-white flex flex-col min-h-screen">
    
    <x-navbar />

    <main class="flex-grow">
        <section class="py-20 px-6 sm:px-8">
            <div class="container mx-auto max-w-5xl">
                
                <div class="flex flex-col items-center justify-center mb-12 animate-fade-in">
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full blur opacity-20 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
                        
                        <img src="{{ asset('storage/ci_logo.png') }}" 
                             alt="Logo Cadeia de Intrusão" 
                             class="relative h-48 md:h-64 w-auto object-contain animate-float drop-shadow-2xl">
                    </div>
                </div>

                <div class="space-y-8 animate-fade-in" style="animation-delay: 0.2s;">
                    
                    <div class="bg-slate-900/50 border border-slate-800 rounded-2xl p-8 md:p-12 shadow-2xl backdrop-blur-sm">
                        <h1 class="text-3xl md:text-4xl font-bold text-white mb-8 text-center border-b border-slate-800 pb-6">
                            Sobre o Projeto
                        </h1>

                        <div class="text-lg md:text-xl text-slate-300 leading-relaxed text-justify space-y-6">
                            
                            <p>
                                Este ambiente foi desenvolvido como parte do Trabalho de Conclusão de Curso (TCC) dos alunos do curso de <strong class="text-blue-400">Tecnologia em Sistemas Para Internet do IFMS</strong>. O foco central é a cibersegurança, dissecando as Táticas, Técnicas e Procedimentos (TTPs) mais críticos da atualidade: Engenharia Social, Phishing, Malware e Ransomware.
                            </p>

                            <p>
                                A metodologia adotada estrutura esses conceitos em um formato de <strong class="text-white">Cadeia de Intrusão</strong>. O objetivo é ensinar cada tópico isoladamente, mas sem perder a visão do todo: um ataque complexo é uma soma de etapas bem-sucedidas.
                            </p>

                            <hr class="border-slate-800 my-6">

                            <p>
                                Tudo começa com o fator humano. A <strong class="text-indigo-400">Engenharia Social</strong> é a base, onde atacantes exploram características psicológicas para aplicar golpes de autoridade — sejam eles pessoais, sem uso de tecnologia, ou mediados por ela. É a arte de hackear pessoas antes de hackear sistemas.
                            </p>

                            <p>
                                Como vetor de entrega dessa manipulação, surge o <strong class="text-indigo-400">Phishing</strong>. Estudamos desde o <em>Mass Phishing</em> (ataques genéricos e volumosos) até o perigoso <em>Spear Phishing</em>, onde o atacante estuda a vítima para criar mensagens customizadas, ricas em detalhes pessoais ou corporativos, convencendo desde funcionários de grandes corporações até usuários em situações rotineiras.
                            </p>

                            <p>
                                Uma vez que a vítima morde a isca (o "bait") — acessando links maliciosos ou baixando anexos em websites de fachada — o <strong class="text-indigo-400">Malware</strong> entra na cadeia. É aqui que ocorrem as execuções de código, exploração de vulnerabilidades (incluindo <em>zero days</em>) e o vazamento silencioso de credenciais.
                            </p>

                            <p>
                                O golpe final se manifesta através do <strong class="text-red-500 font-semibold">Ransomware</strong>. Com uma complexidade técnica elevada, ele atinge desde usuários padrão até infraestruturas críticas, sequestrando dados e exigindo resgates, consolidando o impacto devastador de uma cadeia de intrusão completa.
                            </p>
                        </div>
                    </div>

                    <div class="text-center pt-8">
                        <p class="text-slate-500 italic">
                            "A segurança não é um produto, é um processo."
                        </p>
                        <p class="text-slate-600 text-sm mt-2">
                            IFMS - Instituto Federal de Mato Grosso do Sul
                        </p>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <x-footer />

</body>
</html>