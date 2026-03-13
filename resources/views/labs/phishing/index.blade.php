<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratório de Phishing - Security Lab</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        mono: ['ui-monospace', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', "Liberation Mono", "Courier New", 'monospace']
                    },
                    animation: {
                        'typewriter': 'typewriter 2s steps(40) 1s 1 normal both',
                        'blink': 'blink 500ms steps(40) infinite normal',
                        'glitch': 'glitch 1s linear infinite',
                    },
                    keyframes: {
                        typewriter: {
                            'from': { width: '0' },
                            'to': { width: '100%' }
                        },
                        blink: {
                            'from': { borderColor: 'transparent' },
                            'to': { borderColor: 'orange' }
                        }
                    }
                }
            }
        }
    </script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        .email-item:hover { background-color: rgba(30, 41, 59, 0.8); cursor: pointer; }
        .email-selected { background-color: rgba(59, 130, 246, 0.1); border-left: 4px solid #3B82F6; }
        .matrix-text { text-shadow: 0 0 5px rgba(34, 197, 94, 0.8); }
    </style>
</head>

<x-navbar />
<x-carousel_labs :active-slide="1" />

<body class="bg-slate-950 text-slate-200 antialiased font-sans">
    <main x-data="phishingLab()">
        <div class="container mx-auto px-6 py-10 sm:py-16">
            
            <div class="max-w-4xl mx-auto text-center mb-12">
                <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">
                    Laboratório: <span class="text-red-500">Phishing Simulation</span>
                </h1>
                <p class="mt-4 text-lg text-slate-400 max-w-2xl mx-auto">
                    A arte da enganação digital. Aprenda a diferenciar ataques em massa de ataques direcionados (Spear Phishing) e visualize as consequências.
                </p>
                
                <div class="flex justify-center mt-8 space-x-4">
                    <template x-for="i in 3">
                        <div class="h-2 w-16 rounded-full transition-all duration-300"
                             :class="step >= i ? 'bg-red-600' : 'bg-slate-700'"></div>
                    </template>
                </div>
            </div>

            <div class="mt-8 max-w-5xl mx-auto">
                <div class="bg-slate-900 rounded-xl shadow-2xl overflow-hidden border border-slate-800 relative min-h-[650px]">
                    
                    <div class="bg-slate-800/80 px-4 py-3 flex items-center justify-between border-b border-slate-700">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                            <p class="ml-4 text-sm font-mono text-slate-400 opacity-75">
                                root@kali:~/labs/phishing
                            </p>
                        </div>
                        <div class="text-xs text-red-400 font-mono" x-text="currentModeText"></div>
                    </div>

                    <div class="p-6 sm:p-10">

                        <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95">
                            <h2 class="font-mono text-xl text-cyan-400 font-bold mb-2">
                                <span class="text-pink-500">$</span> ./detect_mass_spam.sh
                            </h2>
                            <p class="text-slate-400 leading-relaxed mb-6">
                                <strong>Missão:</strong> Analise a caixa de entrada abaixo. Identifique qual e-mail é um <strong>Mass Phishing</strong> (ataque genérico).
                            </p>

                            <div class="bg-white rounded-lg overflow-hidden border border-slate-700 text-slate-800 shadow-xl">
                                <div class="bg-slate-200 px-4 py-2 border-b border-slate-300 flex justify-between">
                                    <span class="font-bold text-slate-700">Inbox (1 não lida)</span>
                                    <span class="text-xs text-slate-500">Outlook Web App</span>
                                </div>
                                
                                <div @click="checkEmail(1)" class="email-item p-4 border-b border-slate-200 transition-colors">
                                    <div class="flex justify-between mb-1">
                                        <span class="font-bold text-slate-900">RH - Comunicados</span>
                                        <span class="text-xs text-slate-500">09:15</span>
                                    </div>
                                    <div class="text-sm text-slate-600">Assunto: Atualização da política de férias 2025</div>
                                </div>

                                <div @click="checkEmail(2)" class="email-item p-4 border-b border-slate-200 transition-colors bg-red-50 hover:bg-red-100">
                                    <div class="flex justify-between mb-1">
                                        <span class="font-bold text-red-900">Suporte NUBANK-BRASIL</span>
                                        <span class="text-xs text-red-600">09:42</span>
                                    </div>
                                    <div class="text-sm text-slate-800 font-semibold">Assunto: URGENTE: SVA CONTA FOI BL0QUEADA!!!</div>
                                    <div class="text-xs text-slate-500 mt-1 font-mono">De: seguranca@nu-bank-verify-auth.xyz</div>
                                    <p class="text-xs text-slate-600 mt-2 italic">
                                        "Prezado cliencte, detectamos acesso suspeito. Clique aqui para de-bloquear agora ou perderá o acesso..."
                                    </p>
                                </div>

                                <div @click="checkEmail(3)" class="email-item p-4 transition-colors">
                                    <div class="flex justify-between mb-1">
                                        <span class="font-bold text-slate-900">João Silva (Gestor)</span>
                                        <span class="text-xs text-slate-500">10:05</span>
                                    </div>
                                    <div class="text-sm text-slate-600">Assunto: Reunião de Daily cancelada</div>
                                </div>
                            </div>

                            <div x-show="feedback1" class="mt-6 p-4 rounded bg-slate-900 border border-slate-700 font-mono text-sm flex justify-between items-center">
                                <div x-html="feedback1"></div>
                                <button x-show="canNext1" @click="step = 2" class="ml-4 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded font-bold text-xs uppercase transition-all animate-pulse">
                                    Próximo Nível >>
                                </button>
                            </div>
                        </div>

                        <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95">
                            <h2 class="font-mono text-xl text-cyan-400 font-bold mb-2">
                                <span class="text-pink-500">$</span> ./spear_craft.py 
                            </h2>
                            <p class="text-slate-400 leading-relaxed mb-6">
                                <strong>Missão:</strong> Agora você é o <strong>Red Team</strong>. O alvo é "João Silva Souza" (dados coletados no Lab 1).
                                <br>Selecione o e-mail mais eficiente para comprometê-lo. <span class="text-yellow-400">Ele deve ser crível e contextual.</span>
                            </p>

                            <div class="bg-slate-800 p-3 rounded mb-6 text-xs font-mono text-green-400 border border-green-900/50">
                                [TARGET DATA] Nome: João Silva | Cargo: Dev Fullstack | Time: Flamengo | Pet: Thor | Stack: Laravel/PHP
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                
                                <div @click="selectSpear('A')" class="border border-slate-700 rounded p-4 cursor-pointer hover:border-red-500 hover:bg-slate-800 transition-all group">
                                    <div class="text-xs text-slate-500 mb-2">Opção A</div>
                                    <h4 class="font-bold text-white mb-2">"Você ganhou um Iphone!"</h4>
                                    <p class="text-sm text-slate-400">
                                        Parabéns usuário! Você foi o visitante 1.000.000. Clique aqui para resgatar seu prêmio agora.
                                    </p>
                                </div>

                                <div @click="selectSpear('B')" class="border border-slate-700 rounded p-4 cursor-pointer hover:border-red-500 hover:bg-slate-800 transition-all group">
                                    <div class="text-xs text-slate-500 mb-2">Opção B</div>
                                    <h4 class="font-bold text-white mb-2">"Oi João, e o Thor?"</h4>
                                    <p class="text-sm text-slate-400">
                                        Olá João Silva. Como vai seu cachorro Thor? Sabia que o Flamengo joga hoje? Clique aqui para ver fotos.
                                    </p>
                                </div>

                                <div @click="selectSpear('C')" class="border border-slate-700 rounded p-4 cursor-pointer hover:border-green-500 hover:bg-slate-800 transition-all group ring-1 ring-transparent hover:ring-green-500/50">
                                    <div class="text-xs text-slate-500 mb-2">Opção C</div>
                                    <h4 class="font-bold text-white mb-2">"Code Review: API Laravel"</h4>
                                    <p class="text-sm text-slate-400">
                                        Fala João, acabei de subir o PR da nova API no repo. Dá uma olhada antes do jogo de hoje à noite? O link tá aqui.
                                    </p>
                                </div>
                            </div>

                            <div x-show="feedback2" class="mt-6 p-4 rounded bg-slate-900 border border-slate-700 font-mono text-sm">
                                <div x-html="feedback2"></div>
                                <button x-show="canNext2" @click="step = 3" class="mt-2 py-2 bg-green-600 hover:bg-green-700 text-white rounded font-bold text-xs uppercase transition-all">
                                    Executar Ataque >>
                                </button>
                            </div>
                        </div>

                        <div x-show="step === 3" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95">
                            <h2 class="font-mono text-xl text-cyan-400 font-bold mb-2">
                                <span class="text-pink-500">$</span> ./exfiltrate_data.sh
                            </h2>
                            <p class="text-slate-400 leading-relaxed mb-6">
                                <strong>Cenário:</strong> O alvo clicou no link do e-mail C (Spear Phishing).
                                <br>O link clonou a sessão do navegador. Observe o vazamento em tempo real.
                            </p>

                            <div class="relative w-full h-80 bg-black rounded-lg border-2 border-green-900/50 p-4 font-mono text-xs overflow-hidden shadow-[0_0_20px_rgba(34,197,94,0.1)]">
                                
                                <div x-show="!completed" class="flex flex-col items-center justify-center h-full">
                                    <button @click="triggerLeak()" class="px-8 py-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded shadow-lg animate-pulse transition-all transform hover:scale-105">
                                        [SIMULAR CLIQUE DA VÍTIMA]
                                    </button>
                                </div>

                                <div x-show="leakStarted" class="text-green-500 space-y-1 h-full overflow-y-auto" id="terminalOutput">
                                    <template x-for="line in terminalLines">
                                        <div x-text="line" class="matrix-text"></div>
                                    </template>
                                </div>
                            </div>

                            <div x-show="feedback3" class="mt-6 p-4 rounded bg-slate-900 border border-slate-700 font-mono text-sm">
                                <p x-html="feedback3"></p>
                                
                                <div class="flex gap-4 mt-4">
                                    <a href="{{ route('dashboard') }}" x-show="completed" class="inline-block px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded font-bold font-mono text-xs uppercase tracking-wider transition-all shadow-lg shadow-green-900/50">
                                        Dashboard
                                    </a>
                                    
                                    <a href="{{ route('labs.malware') }}" x-show="completed" class="inline-block px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded font-bold font-mono text-xs uppercase tracking-wider transition-all shadow-lg shadow-blue-900/50">
                                        Próximo Lab: Malware
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function phishingLab() {
            return {
                step: 1,
                get currentModeText() {
                    if(this.step === 1) return '-- MODE: MASS_DETECTION --';
                    if(this.step === 2) return '-- MODE: SPEAR_CRAFTING --';
                    if(this.step === 3) return '-- MODE: EXFILTRATION --';
                },
                
                // --- EXERCÍCIO 1: Mass Phishing ---
                feedback1: '',
                canNext1: false,
                checkEmail(id) {
                    if(id === 2) {
                        this.feedback1 = '<span class="text-green-400 font-bold">[CORRETO]</span> Mass Phishing identificado.<br>Indicadores: Senso de urgência, remetente estranho (.xyz), erros de português ("cliencte", "de-bloquear") e layout genérico.';
                        this.canNext1 = true;
                    } else {
                        this.feedback1 = '<span class="text-red-400 font-bold">[INCORRETO]</span> Este e-mail parece legítimo. Procure por erros de digitação ou domínios suspeitos.';
                    }
                },

                // --- EXERCÍCIO 2: Spear Phishing ---
                feedback2: '',
                canNext2: false,
                selectSpear(option) {
                    if(option === 'C') {
                        this.feedback2 = '<span class="text-green-400 font-bold">[VETOR PERFEITO]</span> O e-mail usa contexto profissional (PR/Repo), linguagem natural e um "gancho" pessoal sutil (futebol), tornando quase impossível distinguir de uma comunicação real.';
                        this.canNext2 = true;
                    } else if(option === 'A') {
                        this.feedback2 = '<span class="text-yellow-400">[FALHA]</span> Muito genérico. Desenvolvedores experientes ignoram promessas de prêmios fáceis. Isso é Spam, não Spear Phishing.';
                    } else {
                        this.feedback2 = '<span class="text-yellow-400">[SUSPEITO]</span> O uso excessivo de dados pessoais (cachorro, esposa) sem contexto cria estranheza e alerta a vítima.';
                    }
                },

                // --- EXERCÍCIO 3: Vazamento ---
                leakStarted: false,
                completed: false,
                feedback3: '',
                terminalLines: [],
                
                async triggerLeak() {
                    this.leakStarted = true;
                    
                    const dataLines = [
                        "[+] Establishing connection to C2 server...",
                        "[+] Target clicked: http://repo-update-api.com/auth",
                        "[+] Bypassing SSL pinning...",
                        "[+] Injecting payload...",
                        "[SUCCESS] Session Token Captured: eyJhbGciOiJIUzI1NiIsIn...",
                        "[*] Dumping LocalStorage...",
                        " -> User: joao_dev90",
                        " -> Email: joao@empresa.com",
                        " -> Last_IP: 192.168.0.42",
                        " -> Cookies: AUTH_SESSION=84921; XSRF-TOKEN=...",
                        "[!] EXFILTRATION COMPLETE. 42KB sent."
                    ];

                    for (const line of dataLines) {
                        this.terminalLines.push(line);
                        // Rola para baixo automaticamente
                        await new Promise(r => setTimeout(r, 400));
                        const term = document.getElementById('terminalOutput');
                        if(term) term.scrollTop = term.scrollHeight;
                    }

                    this.feedback3 = '<span class="text-red-500 font-bold text-lg">[COMPROMETIDO]</span><br>Apenas um clique no link de um e-mail malicioso expôs credenciais e sessões ativas.<br>O Spear Phishing é a porta de entrada para 90% das grandes invasões.';
                    this.completed = true;
                    
                    // Salva no Laravel
                    this.saveProgress();
                },

                // --- SAVE PROGRESS (LÓGICA LARAVEL) ---
                saveProgress() {
                    fetch("{{ route('labs.phishing.complete') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ completed: true })
                    })
                    .then(response => {
                        if (response.ok) {
                            console.log('Status HTTP:', response.status);
                            this.feedback3 += '<br><span class="text-xs text-blue-400 mt-2 block">[SYNC] Progresso registrado no servidor.</span>';
                        } else {
                            throw new Error('Erro na resposta do servidor: ' + response.status);
                        }
                    })
                    .catch(error => {
                        console.error('Erro ao salvar:', error);
                        this.feedback3 += '<br><span class="text-xs text-red-400 mt-2 block">[ERRO] Falha ao conectar com servidor.</span>';
                    });
                }
            }
        }
    </script>
</body>
</html>