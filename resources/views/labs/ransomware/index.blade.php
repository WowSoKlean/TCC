<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratório de Ransomware - Security Lab</title>
    
    <meta name="csrf-token" content="example-token">

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
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'lock-shake': 'shake 0.5s cubic-bezier(.36,.07,.19,.97) both',
                    },
                    keyframes: {
                        shake: {
                            '10%, 90%': { transform: 'translate3d(-1px, 0, 0)' },
                            '20%, 80%': { transform: 'translate3d(2px, 0, 0)' },
                            '30%, 50%, 70%': { transform: 'translate3d(-4px, 0, 0)' },
                            '40%, 60%': { transform: 'translate3d(4px, 0, 0)' }
                        }
                    }
                }
            }
        }
    </script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        .onion-url { font-family: 'Courier New', Courier, monospace; letter-spacing: -0.5px; }
        .encrypted-text { font-family: 'Courier New', monospace; color: #ef4444; }
        .folder-icon { transition: all 0.3s; }
        .locked-file { opacity: 0.5; filter: grayscale(100%); position: relative; }
        .locked-file::after { content: '🔒'; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 24px; }
    </style>
</head>

<x-navbar />
<x-carousel_labs :active-slide="3" />

<body class="bg-slate-950 text-slate-200 antialiased font-sans">
    <main x-data="ransomwareLab()">
        <div class="container mx-auto px-6 py-10 sm:py-16">
            
            <div class="max-w-4xl mx-auto text-center mb-12">
                <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">
                    Laboratório: <span class="text-purple-500">Ransomware Defense</span>
                </h1>
                <p class="mt-4 text-lg text-slate-400 max-w-2xl mx-auto">
                    A ameaça definitiva. Do bloqueio de arquivos pessoais à extorsão dupla de grandes corporações. Entenda a criptografia, a infecção e a negociação.
                </p>
                
                <div class="flex justify-center mt-8 space-x-4">
                    <template x-for="i in 3">
                        <div class="h-2 w-16 rounded-full transition-all duration-300"
                             :class="step >= i ? 'bg-purple-600' : 'bg-slate-700'"></div>
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
                                root@kali:~/labs/ransomware
                            </p>
                        </div>
                        <div class="text-xs text-purple-400 font-mono" x-text="currentModeText"></div>
                    </div>

                    <div class="p-6 sm:p-10 relative">

                        <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95">
                            <h2 class="font-mono text-xl text-cyan-400 font-bold mb-2">
                                <span class="text-pink-500">$</span> ./understand_encryption.sh
                            </h2>
                            <p class="text-slate-400 leading-relaxed mb-6">
                                <strong>Conceito:</strong> O Ransomware usa criptografia (matemática complexa) para tornar seus arquivos ilegíveis.
                                <br>Veja abaixo como um texto legível se transforma em "lixo digital" sem a chave correta.
                            </p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-8">
                                <div>
                                    <label class="block text-xs text-slate-500 mb-1">Entrada (Seus Dados)</label>
                                    <input type="text" x-model="inputText" placeholder="Digite algo aqui..." class="w-full bg-slate-800 border border-slate-700 rounded p-3 text-white focus:ring-2 focus:ring-purple-500 outline-none transition-all">
                                </div>
                                
                                <div class="bg-black p-4 rounded border border-red-900/50 font-mono text-sm break-all h-24 flex items-center">
                                    <span x-text="encryptedText" class="text-red-500"></span>
                                </div>
                            </div>

                            <div x-show="step1Explainer" x-transition:enter="transition ease-out duration-500" class="mb-6 bg-slate-800/50 border-l-4 border-cyan-500 p-4 rounded">
                                <h3 class="text-cyan-400 font-bold text-sm mb-2">Como funciona na prática?</h3>
                                <p class="text-sm text-slate-300">
                                    A maioria dos ransomwares usa <strong>Criptografia Assimétrica</strong> (RSA/ECC).
                                </p>
                                <ul class="list-disc ml-5 mt-2 text-xs text-slate-400 space-y-1">
                                    <li>O malware infecta seu computador contendo apenas uma <strong>Chave Pública</strong>.</li>
                                    <li>Ele criptografa seus arquivos com essa chave.</li>
                                    <li>Para descriptografar, é necessária a <strong>Chave Privada</strong>, que fica apenas no servidor dos criminosos.</li>
                                    <li>É por isso que é matematicamente impossível reverter o processo sem pagar (ou sem um backup).</li>
                                </ul>
                            </div>

                            <div class="bg-slate-800 rounded p-4 border border-slate-700">
                                <h3 class="font-bold text-white mb-4 text-sm">Cadeia de Ataque (Kill Chain):</h3>
                                <div class="flex flex-col md:flex-row justify-between items-center gap-2 text-xs text-center">
                                    <div class="bg-slate-700 p-2 rounded w-full">1. Entrega<br><span class="text-slate-400">(Email/Link)</span></div>
                                    <div class="text-slate-500">→</div>
                                    <div class="bg-slate-700 p-2 rounded w-full">2. Execução<br><span class="text-slate-400">(Clique)</span></div>
                                    <div class="text-slate-500">→</div>
                                    <div class="bg-slate-700 p-2 rounded w-full border border-purple-500">3. Criptografia<br><span class="text-slate-400">(Bloqueio)</span></div>
                                    <div class="text-slate-500">→</div>
                                    <div class="bg-slate-700 p-2 rounded w-full">4. Extorsão<br><span class="text-slate-400">(Pagamento)</span></div>
                                </div>
                            </div>

                            <div class="mt-8 flex justify-end">
                                <button x-show="!step1Explainer" @click="step1Explainer = true" 
                                        :disabled="inputText.length === 0"
                                        :class="inputText.length === 0 ? 'opacity-50 cursor-not-allowed' : 'animate-pulse'"
                                        class="px-6 py-2 bg-cyan-600 hover:bg-cyan-700 text-white rounded font-bold text-xs uppercase transition-all">
                                    Analisar Criptografia >>
                                </button>

                                <button x-show="step1Explainer" @click="step = 2" class="px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded font-bold text-xs uppercase transition-all animate-pulse">
                                    Simular Infecção Real >>
                                </button>
                            </div>
                        </div>

                        <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95">
                            <h2 class="font-mono text-xl text-cyan-400 font-bold mb-2">
                                <span class="text-pink-500">$</span> ./download_invoice.exe
                            </h2>
                            <p class="text-slate-400 leading-relaxed mb-6">
                                <strong>Cenário:</strong> Você recebeu um boleto pendente por e-mail.
                                <br>Ao clicar no arquivo, observe o que acontece com sua pasta "Meus Documentos".
                            </p>

                            <div class="relative w-full h-96 bg-slate-100 rounded-lg overflow-hidden border-4 border-slate-300 shadow-inner">
                                
                                <div class="bg-white p-2 border-b border-slate-300 flex items-center justify-between">
                                    <span class="text-slate-700 text-sm font-bold">📁 Meus Documentos</span>
                                    <div class="flex gap-1"><div class="w-3 h-3 bg-slate-300 rounded-full"></div></div>
                                </div>

                                <div class="p-6 grid grid-cols-4 gap-4">
                                    <div x-show="!infected" @click="infectSystem()" class="flex flex-col items-center cursor-pointer group">
                                        <div class="w-12 h-16 bg-white border border-slate-300 shadow flex items-center justify-center text-red-500 font-bold text-xs relative group-hover:scale-110 transition-transform">
                                            PDF
                                            <div class="absolute -top-1 -right-1 w-3 h-3 bg-yellow-400 rounded-full animate-ping"></div>
                                        </div>
                                        <span class="text-xs text-slate-700 mt-1 font-bold group-hover:text-red-600">Boleto_Vencido.pdf.exe</span>
                                    </div>

                                    <template x-for="file in userFiles">
                                        <div class="flex flex-col items-center" :class="infected ? 'locked-file animate-lock-shake' : ''">
                                            <div class="w-12 h-16 bg-blue-100 border border-blue-200 shadow flex items-center justify-center text-blue-400">DOC</div>
                                            <span class="text-xs text-slate-600 mt-1" x-text="infected ? file + '.crypted' : file"></span>
                                        </div>
                                    </template>
                                </div>

                                <div x-show="showRansomNote" class="absolute inset-0 bg-red-900/95 flex items-center justify-center z-20 p-8 text-center"
                                     x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform scale-150">
                                    <div class="bg-white text-black p-6 rounded shadow-2xl max-w-md border-4 border-red-600">
                                        <h1 class="text-3xl font-bold text-red-600 mb-2">OOPS, SEUS ARQUIVOS FORAM CRIPTOGRAFADOS!</h1>
                                        <p class="text-sm text-slate-700 mb-4">
                                            Não tente recuperar seus arquivos, pois eles estão protegidos por uma chave forte.
                                            Envie $500 em Bitcoin para a carteira abaixo para receber o descodificador.
                                        </p>
                                        <div class="bg-slate-200 p-2 font-mono text-xs mb-4 select-all">bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh</div>
                                        
                                        <p class="font-bold text-sm mb-2">O que você faz?</p>
                                        <div class="flex gap-2 justify-center">
                                            <button @click="makeChoice('pay')" class="px-3 py-1 bg-green-600 text-white rounded text-xs hover:bg-green-700">Pagar Resgate</button>
                                            <button @click="makeChoice('disconnect')" class="px-3 py-1 bg-blue-600 text-white rounded text-xs hover:bg-blue-700">Desconectar Rede</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div x-show="feedback2" class="mt-6 p-4 rounded bg-slate-900 border border-slate-700 font-mono text-sm flex flex-col md:flex-row justify-between items-center gap-4">
                                <div x-html="feedback2"></div>
                                
                                <button x-show="canNext2" @click="step = 3" class="py-2 px-4 bg-purple-600 hover:bg-purple-700 text-white rounded font-bold text-xs uppercase transition-all whitespace-nowrap">
                                    Ver o Lado Corporativo >>
                                </button>

                                <button x-show="retryAllowed" @click="resetInfection()" class="py-2 px-4 bg-yellow-600 hover:bg-yellow-700 text-white rounded font-bold text-xs uppercase transition-all whitespace-nowrap flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                    Tentar Novamente
                                </button>
                            </div>
                        </div>

                        <div x-show="step === 3" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95">
                            <h2 class="font-mono text-xl text-cyan-400 font-bold mb-2">
                                <span class="text-pink-500">$</span> tor-browser connect --onion
                            </h2>
                            <p class="text-slate-400 leading-relaxed mb-6">
                                <strong>Cenário:</strong> Grandes empresas sofrem com a "Dupla Extorsão".
                                <br>Além de prender os arquivos, os atacantes roubam os dados e ameaçam vazá-los publicamente em "Leak Sites" na Dark Web.
                            </p>

                            <div class="w-full h-96 bg-slate-900 border border-slate-600 rounded-lg overflow-hidden flex flex-col">
                                <div class="bg-slate-800 p-2 flex items-center gap-2 border-b border-slate-700">
                                    <div class="w-6 h-6 bg-purple-900 rounded-full flex items-center justify-center text-[10px] text-white font-bold">🧅</div>
                                    <div class="flex-1 bg-black rounded px-3 py-1 text-green-500 font-mono text-xs onion-url">
                                        http://lockbit-blog-supp45s.onion/leaks
                                    </div>
                                </div>

                                <div class="flex-1 bg-black p-6 overflow-y-auto">
                                    <h1 class="text-red-600 font-bold text-3xl mb-1 text-center font-mono">DEADLOCK RANSOMWARE</h1>
                                    <p class="text-slate-500 text-center text-xs mb-8">Nós publicamos dados de empresas que se recusam a pagar.</p>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="border border-red-900/30 bg-red-900/10 p-4 rounded hover:border-red-600 transition-colors cursor-pointer" @click="checkLeak(1)">
                                            <div class="flex justify-between items-start mb-2">
                                                <h3 class="text-white font-bold">MegaCorp Global</h3>
                                                <span class="bg-red-600 text-white text-[10px] px-2 py-0.5 rounded">PUBLICADO</span>
                                            </div>
                                            <p class="text-slate-400 text-xs mb-2">Setor: Financeiro | Receita: $10B</p>
                                            <div class="text-[10px] text-red-400 font-mono">
                                                > 1.2TB de dados<br>
                                                > Contratos, Emails, Senhas<br>
                                                > Status: VAZADO
                                            </div>
                                        </div>

                                        <div class="border border-yellow-900/30 bg-yellow-900/10 p-4 rounded hover:border-yellow-600 transition-colors cursor-pointer" @click="checkLeak(2)">
                                            <div class="flex justify-between items-start mb-2">
                                                <h3 class="text-white font-bold">Hospital Regional</h3>
                                                <span class="bg-yellow-600 text-white text-[10px] px-2 py-0.5 rounded animate-pulse">TIMER: 24h</span>
                                            </div>
                                            <p class="text-slate-400 text-xs mb-2">Setor: Saúde | Dados Pacientes</p>
                                            <div class="text-[10px] text-yellow-400 font-mono">
                                                > Prontuários Médicos<br>
                                                > Informações Pessoais<br>
                                                > Resgate: $5M USD
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-show="feedback3" class="mt-6 p-4 rounded bg-slate-900 border border-slate-700 font-mono text-sm">
                                <p x-html="feedback3"></p>
                                
                                <div class="flex gap-4 mt-4">
                                    <a href="#" class="inline-block px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded font-bold font-mono text-xs uppercase tracking-wider transition-all shadow-lg shadow-green-900/50">
                                        Voltar ao Dashboard
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
        function ransomwareLab() {
            return {
                step: 1,
                get currentModeText() {
                    if(this.step === 1) return '-- MODE: CRYPTO_EDUCATION --';
                    if(this.step === 2) return '-- MODE: INFECTION_SIM --';
                    if(this.step === 3) return '-- MODE: DARKWEB_INTEL --';
                },
                
                // --- EXERCÍCIO 1: Criptografia ---
                inputText: '',
                step1Explainer: false, // Controla a visibilidade da explicação
                
                get encryptedText() {
                    if(!this.inputText) return 'Aguardando entrada...';
                    return this.inputText.split('').map(c => {
                        return String.fromCharCode(c.charCodeAt(0) + 5);
                    }).join('') + '#x9F';
                },

                // --- EXERCÍCIO 2: Infecção ---
                userFiles: ['TCC_Final', 'Fotos_Ferias', 'Planilha_Gastos', 'Backup_2024'],
                infected: false,
                showRansomNote: false,
                feedback2: '',
                canNext2: false,
                retryAllowed: false, // Controle do botão de retry

                infectSystem() {
                    this.infected = true;
                    setTimeout(() => {
                        this.showRansomNote = true;
                    }, 1500);
                },

                makeChoice(choice) {
                    this.showRansomNote = false;
                    if (choice === 'pay') {
                        this.feedback2 = '<span class="text-yellow-400 font-bold">[ERRO CRÍTICO]</span> Pagar financia o cibercrime e não garante a recuperação (apenas 60% recebem a chave). Além disso, você entra em uma "lista de pagadores" para ataques futuros.';
                        this.retryAllowed = true;
                        this.canNext2 = false;
                    } else {
                        this.feedback2 = '<span class="text-green-400 font-bold">[CORRETO]</span> Isolar o dispositivo infectado é a prioridade 01 para evitar movimento lateral na rede. A recuperação deve ser feita via Backups Offline (Regra 3-2-1).';
                        this.canNext2 = true;
                        this.retryAllowed = false;
                    }
                },

                resetInfection() {
                    this.infected = false;
                    this.showRansomNote = false;
                    this.feedback2 = '';
                    this.retryAllowed = false;
                    this.canNext2 = false;
                },

                // --- EXERCÍCIO 3: Dark Web ---
                feedback3: '',
                completed: false,

                checkLeak(id) {
                    this.feedback3 = `
                        <span class="text-purple-400 font-bold text-lg">[DUPLA EXTORSÃO CONFIRMADA]</span><br>
                        Os grupos de Ransomware modernos (como LockBit e BlackCat) não apenas criptografam. Eles exfiltram (roubam) os dados antes.<br>
                        Se a vítima tem backup e não paga, eles vazam os segredos industriais ou dados de clientes.<br>
                        Isso transforma um problema de TI em uma crise de reputação e legal (LGPD).
                    `;
                    this.completed = true;
                    this.saveProgress();
                },

                saveProgress() {
                    // Simulação do fetch para o exemplo
                    console.log("Progresso salvo: Curso concluído.");
                    this.feedback3 += '<br><span class="text-xs text-blue-400 mt-2 block">[SYNC] Curso Concluído. Progresso Salvo no Console.</span>';
                }
            }
        }
    </script>
</body>
</html>