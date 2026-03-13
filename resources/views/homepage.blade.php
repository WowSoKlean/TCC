<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Lab - Homepage</title>
    
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', 'Roboto', '"Helvetica Neue"', 'Arial', '"Noto Sans"', 'sans-serif', '"Apple Color Emoji"', '"Segoe UI Emoji"', '"Segoe UI Symbol"', '"Noto Color Emoji"'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
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
        <section class="py-20 px-6 relative overflow-hidden">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-7xl pointer-events-none opacity-20">
                <div class="absolute top-20 left-1/4 w-96 h-96 bg-blue-600 rounded-full blur-[100px]"></div>
                <div class="absolute bottom-20 right-1/4 w-80 h-80 bg-purple-600 rounded-full blur-[100px]"></div>
            </div>

            <div class="container mx-auto relative z-10 max-w-6xl">
                <div class="text-center mb-16">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white tracking-tight mb-6">
                        Bem-vindo ao seu <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500">Laboratório de Segurança!</span>
                    </h1>
                    <p class="max-w-3xl mx-auto text-lg text-slate-400 leading-relaxed">
                        Este capítulo analisa a simbiose entre as Táticas, Técnicas e Procedimentos (TTPs) mais prevalentes no cenário atual: <span class="text-blue-400 font-semibold">Phishing, Engenharia Social, Malware e Ransomware</span>. Demonstra-se como vulnerabilidades humanas e técnicas são exploradas em cadeia para maximizar danos.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10 text-left mb-16">
                    
                    <div class="space-y-8">
                        <div class="bg-slate-900/50 p-6 rounded-xl border border-slate-800 hover:border-blue-500/30 transition-colors">
                            <h3 class="text-xl font-bold text-white mb-3 flex items-center">
                                <span class="bg-blue-600/20 text-blue-400 text-sm font-bold px-2 py-1 rounded mr-3">01</span>
                                Cenário Econômico e Contexto
                            </h3>
                            <p class="text-slate-400 mb-3 text-sm">O cibercrime evoluiu de vandalismo para uma indústria lucrativa.</p>
                            <ul class="space-y-2 text-sm text-slate-300">
                                <li class="flex items-start"><span class="text-blue-500 mr-2">•</span> <strong>Impacto Global:</strong> Estima-se US$ 10,5 trilhões anuais até 2025.</li>
                                <li class="flex items-start"><span class="text-blue-500 mr-2">•</span> <strong>Custo de Violação:</strong> Média de US$ 4,88 milhões em 2024.</li>
                                <li class="flex items-start"><span class="text-blue-500 mr-2">•</span> <strong>Brasil:</strong> Alvo prioritário na LatAm (fraudes/extorsão).</li>
                            </ul>
                        </div>

                        <div class="bg-slate-900/50 p-6 rounded-xl border border-slate-800 hover:border-blue-500/30 transition-colors">
                            <h3 class="text-xl font-bold text-white mb-3 flex items-center">
                                <span class="bg-blue-600/20 text-blue-400 text-sm font-bold px-2 py-1 rounded mr-3">02</span>
                                O Fator Humano (Porta de Entrada)
                            </h3>
                            <p class="text-slate-400 mb-3 text-sm">A maioria das intrusões inicia-se na manipulação psicológica.</p>
                            <ul class="space-y-2 text-sm text-slate-300">
                                <li class="flex items-start"><span class="text-blue-500 mr-2">•</span> <strong>Engenharia Social:</strong> Explora gatilhos como urgência e medo.</li>
                                <li class="flex items-start"><span class="text-blue-500 mr-2">•</span> <strong>Phishing & OSINT:</strong> E-mails personalizados via dados públicos.</li>
                                <li class="flex items-start"><span class="text-blue-500 mr-2">•</span> <strong>Crise de Credenciais:</strong> Senhas fracas geram ataques de <em>Credential Stuffing</em>.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div class="bg-slate-900/50 p-6 rounded-xl border border-slate-800 hover:border-blue-500/30 transition-colors">
                            <h3 class="text-xl font-bold text-white mb-3 flex items-center">
                                <span class="bg-blue-600/20 text-blue-400 text-sm font-bold px-2 py-1 rounded mr-3">03</span>
                                Arsenal Técnico & Cyber Kill Chain
                            </h3>
                            <p class="text-slate-400 mb-3 text-sm">O ataque segue um fluxo lógico encadeado:</p>
                            <ol class="space-y-2 text-sm text-slate-300 list-decimal list-inside pl-1">
                                <li><strong class="text-white">Acesso Inicial:</strong> Via Phishing.</li>
                                <li><strong class="text-white">Instalação:</strong> Malware furtivo (Spyware).</li>
                                <li><strong class="text-white">Movimentação:</strong> Escalada de privilégios.</li>
                                <li><strong class="text-white">Ação (Ransomware):</strong> Dupla extorsão e RaaS (Ransomware-as-a-Service).</li>
                            </ol>
                        </div>

                        <div class="bg-slate-900/50 p-6 rounded-xl border border-slate-800 hover:border-blue-500/30 transition-colors">
                            <h3 class="text-xl font-bold text-white mb-3 flex items-center">
                                <span class="bg-blue-600/20 text-blue-400 text-sm font-bold px-2 py-1 rounded mr-3">04</span>
                                Mitigação: Defesa em Profundidade
                            </h3>
                            <p class="text-slate-400 mb-3 text-sm">Foco em múltiplas camadas de proteção.</p>
                            <ul class="space-y-2 text-sm text-slate-300">
                                <li class="flex items-start"><span class="text-green-500 mr-2">✓</span> <strong>MFA:</strong> Exige Conhecimento, Posse e Inerência.</li>
                                <li class="flex items-start"><span class="text-green-500 mr-2">✓</span> <strong>Passwordless (FIDO2):</strong> Chaves criptográficas em hardware anulam Phishing.</li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="mt-8 pt-8 border-t border-slate-800 text-left">
                    <h4 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Referências Bibliográficas</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs text-slate-500">
                        <ul class="space-y-2">
                            <li>[1] IBM Security. <em>Cost of a Data Breach Report 2024</em>.</li>
                            <li>[2] CERT.br. <a href="https://stats.cert.br/incidentes/" class="hover:text-blue-400 underline decoration-slate-700">Estatísticas de Incidentes.</a></li>
                            <li>[3] Cybersecurity Ventures. <em>Cybercrime To Cost The World $8 Trillion.</em></li>
                            <li>[4] Mitnick, Kevin D. <em>The Art of Deception.</em> Wiley, 2002.</li>
                            <li>[5] NIST. <a href="https://www.nist.gov/cybersecurity/how-do-i-create-good-password" class="hover:text-blue-400 underline decoration-slate-700">How Do I Create a Good Password?</a></li>
                        </ul>
                        <ul class="space-y-2">
                            <li>[6] Sikorski & Honig. <em>Practical Malware Analysis.</em> No Starch Press.</li>
                            <li>[7] CERT.br. <a href="https://cert.br/docs/ransomware/entender/" class="hover:text-blue-400 underline decoration-slate-700">Ransomware: Entenda o que é.</a></li>
                            <li>[8] Lockheed Martin. <em>The Cyber Kill Chain.</em></li>
                            <li>[9] NIST. <a href="https://pages.nist.gov/800-63-3/sp800-63-3.html" class="hover:text-blue-400 underline decoration-slate-700">Digital Identity Guidelines (SP 800-63-3).</a></li>
                            <li>[10] IBM. <a href="https://www.ibm.com/br-pt/think/topics/fido2" class="hover:text-blue-400 underline decoration-slate-700">O que é FIDO2?</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mt-16 text-center">
                    <a href="{{ route('labs.engenharia-social') }}" class="inline-flex items-center justify-center bg-blue-600 text-white font-bold py-4 px-10 rounded-lg text-lg hover:bg-blue-500 transition-all transform hover:scale-105 shadow-[0_0_20px_rgba(37,99,235,0.3)] hover:shadow-[0_0_30px_rgba(37,99,235,0.5)]">
                        Começar Laboratório
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <section class="py-16 px-6 bg-[#0B1120]" id="mural-carousel">
            <div class="container mx-auto">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold text-white">Destaques dos Módulos</h2>
                    <div class="h-1 flex-grow mx-6 bg-slate-800 rounded"></div>
                </div>

                <div class="relative bg-slate-900 rounded-xl shadow-2xl border border-slate-800 overflow-hidden min-h-[400px]">
                    <div id="carousel-slides" class="relative w-full h-full">
                        
                        <div class="carousel-slide block w-full h-full">
                            <div class="flex flex-col h-full justify-center">
                                <div class="w-full max-w-4xl mx-auto p-10 flex flex-col justify-center">
                                    <span class="text-blue-400 font-bold tracking-wider uppercase text-sm mb-2">Módulo 01</span>
                                    <h3 class="text-3xl font-bold text-white mb-4">Engenharia Social</h3>
                                    <p class="text-slate-400 text-lg leading-relaxed">
                                        A Engenharia Social utiliza a influência e a persuasão para enganar as pessoas, convencendo-as de que o engenheiro social é quem ele não é, ou através da manipulação. Consequentemente, o engenheiro social consegue aproveitar-se das pessoas para obter informações, com ou sem o auxílio da tecnologia.
                                    </p>
                                    <footer class="mt-6 text-base font-medium text-slate-300">
                                        — Kevin Mitnick
                                        <span class="block text-sm font-normal text-slate-500 italic mt-1">The Art of Deception, pág. 2</span>
                                    </footer>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-slide hidden w-full h-full">
                            <div class="flex flex-col h-full justify-center">
                                <div class="w-full max-w-4xl mx-auto p-10 flex flex-col justify-center">
                                    <span class="text-blue-400 font-bold tracking-wider uppercase text-sm mb-2">Módulo 02</span>
                                    <h3 class="text-3xl font-bold text-white mb-4">Phishing</h3>
                                    <p class="text-slate-400 text-lg leading-relaxed mb-6">
                                        Neste contexto, o Phishing atua como o vetor de entrega mais comum. Através de e-mails ou mensagens fraudulentas que mimetizam entidades confiáveis, atacantes exploram gatilhos cognitivos como urgência, medo ou curiosidade.
                                    </p>
                                    <blockquote class="text-slate-300 text-lg leading-relaxed italic border-l-4 border-blue-500 pl-4">
                                        "Em depoimento ao Congresso, expliquei que frequentemente conseguia obter senhas e outras informações confidenciais de empresas, simplesmente fingindo ser outra pessoa e pedindo por elas."
                                    </blockquote>
                                    <footer class="mt-6 text-base font-medium text-slate-300">
                                        — Kevin Mitnick
                                        <span class="block text-sm font-normal text-slate-500 italic mt-1">The Art of Deception, pág. 14</span>
                                    </footer>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-slide hidden w-full h-full">
                            <div class="flex flex-col h-full justify-center">
                                <div class="w-full max-w-4xl mx-auto p-10 flex flex-col justify-center">
                                    <span class="text-blue-400 font-bold tracking-wider uppercase text-sm mb-2">Módulo 03</span>
                                    <h3 class="text-3xl font-bold text-white mb-4">Malware</h3>
                                    <p class="text-slate-400 text-lg leading-relaxed">
                                        Softwares maliciosos desempenham um papel na maioria das intrusões. Qualquer software que execute ações prejudiciais a um usuário, computador ou rede pode ser considerado malware, incluindo vírus, cavalos de troia, worms, rootkits, scareware e spyware.
                                    </p>
                                    <footer class="mt-6 text-base font-medium text-slate-300">
                                        — Sikorski & Honig
                                        <span class="block text-sm font-normal text-slate-500 italic mt-1">Practical Malware Analysis, pág. 29</span>
                                    </footer>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-slide hidden w-full h-full">
                            <div class="flex flex-col h-full justify-center">
                                <div class="w-full max-w-4xl mx-auto p-10 flex flex-col justify-center">
                                    <span class="text-blue-400 font-bold tracking-wider uppercase text-sm mb-2">Módulo 04</span>
                                    <h3 class="text-3xl font-bold text-white mb-4">Ransomware</h3>
                                    <p class="text-slate-400 text-lg leading-relaxed mb-4">
                                        Originalmente, ransomware apenas bloqueava dados. Recentemente, evoluiu para ataques elaborados com "dupla extorsão": os atacantes exfiltram dados antes de criptografar, ameaçando vazar informações sensíveis caso o resgate não seja pago.
                                    </p>
                                    <footer class="mt-6 text-base font-medium text-slate-300">
                                        — CERT.br
                                        <span class="block text-sm font-normal text-slate-500 italic mt-1">
                                            <a href="https://cert.br/docs/ransomware/" target="_blank" class="text-blue-400 hover:text-blue-300 hover:underline">Fascículo Ransomware</a>
                                        </span>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button id="prevSlide" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-slate-800/80 hover:bg-slate-700 text-white p-2 rounded-full shadow-md border border-slate-700 transition-colors z-10 backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="nextSlide" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-slate-800/80 hover:bg-slate-700 text-white p-2 rounded-full shadow-md border border-slate-700 transition-colors z-10 backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const slides = document.querySelectorAll('.carousel-slide');
                    const prevBtn = document.getElementById('prevSlide');
                    const nextBtn = document.getElementById('nextSlide');
                    let currentSlide = 0;

                    function showSlide(index) {
                        if (index >= slides.length) currentSlide = 0;
                        else if (index < 0) currentSlide = slides.length - 1;
                        else currentSlide = index;

                        slides.forEach((slide, i) => {
                            if (i === currentSlide) {
                                slide.classList.remove('hidden');
                                slide.classList.add('block', 'animate-fade-in');
                            } else {
                                slide.classList.add('hidden');
                                slide.classList.remove('block');
                            }
                        });
                    }

                    nextBtn.addEventListener('click', () => showSlide(currentSlide + 1));
                    prevBtn.addEventListener('click', () => showSlide(currentSlide - 1));
                    
                    // Auto-advance (Opcional)
                    // setInterval(() => showSlide(currentSlide + 1), 8000);
                });
            </script>
        </section>

    </main>

    <x-footer />
</body>
</html>