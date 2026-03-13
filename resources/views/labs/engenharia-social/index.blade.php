<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratório de Engenharia Social - Security Lab</title>
    
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
                    }
                }
            }
        }
    </script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        .json-row { transition: all 0.2s; }
        .json-row:hover { background-color: rgba(59, 130, 246, 0.1); cursor: pointer; }
        .json-selected { background-color: rgba(59, 130, 246, 0.2); border-left: 3px solid #60A5FA; padding-left: 13px !important; }
        .json-unselected { border-left: 3px solid transparent; }
        .cursor-scope { cursor: crosshair; }
    </style>
</head>

<x-navbar />
<x-carousel_labs :active-slide="0" />

<body class="bg-slate-950 text-slate-200 antialiased font-sans">
    <main x-data="socialLab()">
        <div class="container mx-auto px-6 py-10 sm:py-16">
            
            <div class="max-w-4xl mx-auto text-center mb-12">
                <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight">
                    Laboratório: <span class="text-blue-500">Engenharia Social</span>
                </h1>
                <p class="mt-4 text-lg text-slate-400 max-w-2xl mx-auto">
                    A engenharia social manipula a psicologia humana. Identifique impostores, filtre dados relevantes em vazamentos e realize reconhecimento visual.
                </p>
                
                <div class="flex justify-center mt-8 space-x-4">
                    <template x-for="i in 3">
                        <div class="h-2 w-16 rounded-full transition-all duration-300"
                             :class="step >= i ? 'bg-blue-600' : 'bg-slate-700'"></div>
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
                                root@kali:~/labs/engenharia-social
                            </p>
                        </div>
                        <div class="text-xs text-blue-400 font-mono" x-text="currentModeText"></div>
                    </div>

                    <div class="p-6 sm:p-10">

                        <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95">
                            <h2 class="font-mono text-xl text-cyan-400 font-bold mb-2">
                                <span class="text-pink-500">$</span> ./analise_origem.sh
                            </h2>
                            <p class="text-slate-400 leading-relaxed mb-6">
                                <strong>Missão:</strong> Um atacante está tentando aplicar um golpe de autoridade.
                                Descubra o <strong>indicador técnico</strong> que comprova a fraude.
                            </p>

                            <div class="bg-black rounded-lg border border-slate-800 p-6 h-96 overflow-y-auto space-y-6 font-mono text-sm relative">
                                
                                <div class="flex flex-col">
                                    <div class="flex items-center mb-1 gap-2">
                                        <div class="w-6 h-6 rounded-full bg-blue-900 flex items-center justify-center text-xs text-blue-200">RT</div>
                                        <span class="text-blue-400 text-xs">roberto.ti@empresa.com</span>
                                    </div>
                                    <div class="bg-slate-800 text-slate-300 p-3 rounded-r-lg rounded-bl-lg max-w-lg border-l-2 border-blue-500">
                                        [10:14 AM] Pessoal, apenas avisando que faremos manutenção nos servidores hoje à noite.
                                    </div>
                                </div>

                                <div class="flex flex-col items-end">
                                    <span class="text-green-400 text-xs mb-1">voce@empresa.com</span>
                                    <div class="bg-slate-700 text-white p-3 rounded-l-lg rounded-br-lg max-w-lg">
                                        [10:15 AM] Ciente, Roberto. Obrigado.
                                    </div>
                                </div> 

                                <div class="flex flex-col mt-4">
                                    <div class="flex items-center mb-1 gap-2 group cursor-pointer w-fit" @click="checkSender(true)">
                                        <div class="w-6 h-6 rounded-full bg-slate-700 flex items-center justify-center text-xs text-slate-300">DT</div>
                                        
                                        <span class="text-slate-400 text-xs border-b border-transparent transition-colors hover:text-slate-200">
                                            diretor.tecnico@suporte-global-auth.net
                                        </span>
                                        <span class="text-[10px] text-slate-600 ml-2 group-hover:text-slate-400 opacity-0 group-hover:opacity-100 transition-opacity">
                                    </div>

                                    <div class="bg-slate-800 text-slate-200 p-4 rounded-r-lg rounded-bl-lg max-w-xl border-l-2 border-red-500 shadow-lg opacity-90">
                                        <div class="flex items-center gap-2 mb-2 text-red-400">
                                            <div class="w-5 h-5 rounded-full bg-red-500 flex items-center justify-center text-xs text-white font-bold">!</div>
                                            <strong>[URGENTE - AÇÃO NECESSÁRIA]</strong>
                                        </div>
                                        <p class="leading-relaxed">
                                            Boa noite pessoal. Sou Lucas, Diretor Regional, ID [33345]. Devido à manutenção citada, perdemos a sincronia do SAP. Preciso que valide seu acesso AGORA neste link ou seu usuário será bloqueado. Peço desculpas pelo incômodo, mas isto evitará danos ainda maiores.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div x-show="feedback1" class="mt-6 p-4 rounded bg-slate-900 border border-slate-700 font-mono text-sm flex justify-between items-center">
                                <div x-html="feedback1"></div>
                                <button x-show="canNext1" @click="step = 2" class="ml-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded font-bold text-xs uppercase transition-all animate-pulse">
                                    Próximo Nível >>
                                </button>
                            </div>
                        </div>

                        <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95">
                            <h2 class="font-mono text-xl text-cyan-400 font-bold mb-2">
                                <span class="text-pink-500">$</span> ./wordlist_builder.py
                            </h2>
                            <p class="text-slate-400 leading-relaxed mb-6">
                                <strong>Missão:</strong> Modelagem de Contexto.
                                <br><span class="text-white font-bold">Selecione apenas os dados com alta probabilidade de estarem na senha do alvo.</span>
                            </p>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <div class="bg-black rounded border border-slate-700 p-4 font-mono text-xs sm:text-sm text-slate-300 overflow-x-auto shadow-inner select-none">
                                    <div class="mb-2 text-slate-500">// target_dump_v2.json</div>
                                    <div>{</div>
                                    <div @click="toggleField('id')" :class="getClass('id')" class="pl-4 py-1 json-row">
                                        "id": <span class="text-purple-400">84921</span>,
                                    </div>
                                    <div @click="toggleField('full_name')" :class="getClass('full_name')" class="pl-4 py-1 json-row">
                                        "full_name": "<span class="text-yellow-300">João Silva Souza</span>",
                                    </div>
                                    <div @click="toggleField('username')" :class="getClass('username')" class="pl-4 py-1 json-row">
                                        "username": "<span class="text-green-400">joao_dev90</span>",
                                    </div>
                                    <div @click="toggleField('ip')" :class="getClass('ip')" class="pl-4 py-1 json-row">
                                        "last_login_ip": "<span class="text-slate-400">192.168.0.42</span>",
                                    </div>
                                    <div @click="toggleField('birth_date')" :class="getClass('birth_date')" class="pl-4 py-1 json-row">
                                        "birth_date": "<span class="text-blue-400">1990-05-15</span>",
                                    </div>
                                    <div @click="toggleField('bio')" :class="getClass('bio')" class="pl-4 py-1 json-row">
                                        "bio": "<span class="text-slate-400">Dev apaixonado por café e código.</span>",
                                    </div>
                                    <div @click="toggleField('pet_name')" :class="getClass('pet_name')" class="pl-4 py-1 json-row">
                                        "security_answer_pet": "<span class="text-pink-400">Thor</span>",
                                    </div>
                                    <div @click="toggleField('soccer_team')" :class="getClass('soccer_team')" class="pl-4 py-1 json-row">
                                        "favorite_team": "<span class="text-red-400">Flamengo</span>",
                                    </div>
                                    <div @click="toggleField('spouse')" :class="getClass('spouse')" class="pl-4 py-1 json-row">
                                        "spouse_name": "<span class="text-purple-400">Ana</span>",
                                    </div>
                                    <div @click="toggleField('newsletter')" :class="getClass('newsletter')" class="pl-4 py-1 json-row">
                                        "newsletter_optin": <span class="text-orange-400">true</span>
                                    </div>
                                    <div>}</div>
                                </div>

                                <div class="flex flex-col justify-center space-y-4">
                                    <div class="bg-slate-800 p-4 rounded border border-slate-700 h-48 overflow-y-auto">
                                        <h3 class="text-white font-bold mb-2 border-b border-slate-600 pb-2">Console de Análise:</h3>
                                        <p x-show="!feedback2" class="text-slate-500 text-xs italic">Aguardando seleção de vetores...</p>
                                        <div x-html="feedback2" class="text-sm font-mono space-y-2"></div>
                                    </div>
                                    <button @click="verifySelection()" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-mono font-bold py-3 px-4 rounded shadow-lg transition-all border border-blue-500">
                                        Compilar Wordlist
                                    </button>
                                    <button x-show="canNext2" @click="step = 3" class="w-full bg-green-600 hover:bg-green-700 text-white font-mono font-bold py-2 rounded transition-all">
                                        Avançar 
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div x-show="step === 3" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95">
                            <h2 class="font-mono text-xl text-cyan-400 font-bold mb-2">
                                <span class="text-pink-500">$</span> ./recon_visual.sh 
                            </h2>
                            <p class="text-slate-400 leading-relaxed mb-6">
                                <strong>Missão:</strong> Reconhecimento Visual.
                                Encontre o vazamento de credencial nesta mesa bagunçada.
                            </p>

                            <div class="relative w-full h-96 bg-slate-900 rounded-lg border-2 border-slate-700 flex justify-center items-end overflow-hidden select-none cursor-scope">
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-800 via-slate-900 to-black opacity-60"></div>
                                <div class="absolute bottom-0 w-full h-16 bg-slate-800 border-t border-slate-600"></div>
                                
                                <div class="absolute bottom-12 right-20 sm:right-32 z-20 group cursor-help" @click="checkObject(false, 'Smartphone')">
                                    <div class="w-16 h-28 bg-slate-800 border-4 border-slate-600 rounded-xl relative shadow-2xl transform rotate-6 hover:rotate-0 transition duration-300 flex flex-col items-center p-2">
                                        <div class="w-6 h-1 bg-slate-700 rounded-full mb-2"></div>
                                        <div class="flex-1 w-full bg-slate-900 rounded flex items-center justify-center">
                                            <span class="text-[8px] text-slate-500 font-mono">LOCKED</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="absolute bottom-16 left-4 group cursor-help" @click="checkObject(false, 'Roteador Wi-Fi')">
                                    <div class="w-16 h-4 bg-slate-950 rounded relative">
                                        <div class="absolute -top-6 left-2 w-1 h-8 bg-slate-700"></div>
                                        <div class="absolute -top-6 right-2 w-1 h-8 bg-slate-700"></div>
                                        <div class="flex gap-1 justify-center mt-1">
                                            <div class="w-1 h-1 bg-green-500 rounded-full animate-pulse"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="absolute bottom-10 left-24 md:left-32 group cursor-help" @click="checkObject(false, 'Caneca de Café')">
                                    <div class="w-10 h-12 bg-orange-700 rounded-lg relative shadow-xl">
                                        <div class="absolute -right-2 top-2 w-3 h-6 border-4 border-orange-700 rounded-r-lg"></div>
                                    </div>
                                </div>

                                <div class="absolute bottom-14 left-[55%] z-20 group cursor-help" @click="checkObject(false, 'Pendrive USB')">
                                    <div class="w-8 h-3 bg-slate-400 rounded-sm relative shadow-md transform -rotate-12 hover:scale-110 transition-transform">
                                        <div class="absolute right-0 top-0 w-3 h-3 bg-slate-600 rounded-r-sm border-l border-slate-500"></div>
                                        <div class="absolute left-1 top-1 w-1 h-1 bg-slate-800 rounded-full"></div>
                                    </div>
                                </div>

                                <div class="absolute bottom-8 right-4 sm:right-8 z-10 group cursor-help" @click="checkObject(false, 'Caderno de Anotações')">
                                    <div class="w-24 h-16 bg-slate-200 transform skew-x-12 rotate-3 shadow-lg p-2 relative">
                                        <div class="absolute -top-2 left-0 w-full h-2 flex justify-evenly">
                                            <div class="w-1 h-3 bg-slate-800 -rotate-12 rounded-full"></div>
                                            <div class="w-1 h-3 bg-slate-800 -rotate-12 rounded-full"></div>
                                            <div class="w-1 h-3 bg-slate-800 -rotate-12 rounded-full"></div>
                                            <div class="w-1 h-3 bg-slate-800 -rotate-12 rounded-full"></div>
                                        </div>
                                        <div class="w-full h-px bg-slate-400 mb-2 mt-1"></div>
                                        <div class="w-10 h-1 bg-slate-400 rounded mb-2 ml-2"></div>
                                        <div class="w-16 h-1 bg-slate-400 rounded ml-1"></div>
                                    </div>
                                </div>

                                <div class="absolute bottom-10 right-[35%] z-20 group cursor-help" @click="checkObject(false, 'Mouse Gamer')">
                                    <div class="w-10 h-14 bg-slate-900 rounded-t-[20px] rounded-b-[15px] border border-slate-700 shadow-xl relative">
                                        <div class="absolute top-2 left-1/2 transform -translate-x-1/2 w-1.5 h-3 bg-cyan-500 rounded-full shadow-[0_0_5px_rgba(6,182,212,0.8)]"></div>
                                        <div class="absolute bottom-2 w-full h-1 bg-gradient-to-r from-pink-500 to-cyan-500 opacity-50 blur-[1px]"></div>
                                    </div>
                                </div>

                                <div class="absolute bottom-32 left-1/2 ml-[7rem] z-10 group cursor-pointer" @click="checkObject(true, 'Post-it')" title="Clique aqui">
                                    <div class="w-10 h-10 bg-yellow-300 shadow-sm transform rotate-6 flex items-center justify-center border border-yellow-400 hover:ml-4 transition-all duration-300">
                                        <div class="text-[5px] text-slate-900 font-mono font-bold leading-none text-center opacity-0 group-hover:opacity-100">
                                            PW:<br>123
                                        </div>
                                    </div>
                                </div>

                                <div class="absolute bottom-16 w-64 h-40 bg-slate-950 border-4 border-slate-700 rounded-t-lg shadow-2xl flex items-center justify-center z-20">
                                    <span class="text-slate-700 font-mono text-xs">NO SIGNAL</span>
                                </div>
                                <div class="absolute bottom-10 w-8 h-6 bg-slate-800 z-10"></div> 
                            </div>

                            <div x-show="feedback3" class="mt-6 p-4 rounded bg-slate-900 border border-slate-700 font-mono text-sm">
                                <p x-html="feedback3"></p>
                                
                                <a href="{{ route('dashboard') }}" x-show="completed" class="inline-block mt-4 px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded font-bold font-mono text-xs uppercase tracking-wider transition-all shadow-lg shadow-green-900/50">
                                    Dashboard
                                </a>

                                <a href="{{ route('labs.phishing') }}" x-show="completed" class="inline-block ml-4 mt-4 px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded font-bold font-mono text-xs uppercase tracking-wider transition-all shadow-lg shadow-blue-900/50">
                                    Próximo Lab: Phishing
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function socialLab() {
            return {
                step: 1,
                get currentModeText() {
                    if(this.step === 1) return '-- MODE: SOURCE_VERIFICATION --';
                    if(this.step === 2) return '-- MODE: DATA_MINING --';
                    if(this.step === 3) return '-- MODE: VISUAL_RECON --';
                },
                // EXERCICIO 1
                feedback1: '',
                canNext1: false,
                checkSender(isMalicious) {
                    if(isMalicious) {
                        this.feedback1 = '<span class="text-green-400 font-bold">[DETECTADO]</span> Domínio externo confirmado. Atacantes usam domínios parecidos (typosquatting) para enganar.';
                        this.canNext1 = true;
                    }
                },
                // EXERCICIO 2
                selectedFields: [],
                feedback2: '',
                canNext2: false,
                toggleField(field) {
                    if (this.selectedFields.includes(field)) {
                        this.selectedFields = this.selectedFields.filter(f => f !== field);
                    } else {
                        this.selectedFields.push(field);
                    }
                    this.feedback2 = ''; 
                    this.canNext2 = false;
                },
                getClass(field) {
                    return this.selectedFields.includes(field) ? 'json-selected' : 'json-unselected';
                },
                verifySelection() {
                    const highValue = ['pet_name', 'soccer_team', 'birth_date', 'spouse', 'username', 'full_name'];
                    const noiseMap = {
                        'id': 'IDs de banco de dados são gerados pelo sistema.',
                        'ip': 'Endereços IP mudam (DHCP).',
                        'bio': 'Bios são públicas demais.',
                        'newsletter': 'Booleanos não têm entropia.'
                    };
                    const selectedNoise = this.selectedFields.filter(f => Object.keys(noiseMap).includes(f));
                    const selectedTargets = this.selectedFields.filter(f => highValue.includes(f));
                    let html = '';
                    if (selectedNoise.length > 0) {
                        html += `<div class="text-red-400 mb-2">[ERRO] Ruído detectado na wordlist:</div>`;
                        selectedNoise.forEach(f => { html += `<div class="text-slate-400 ml-2">- ${f}: ${noiseMap[f]}</div>`; });
                    } else if (selectedTargets.length < 4) {
                        html += `<div class="text-yellow-400">[INSUFICIENTE] Selecione mais dados pessoais.</div>`;
                    } else {
                        html += `<div class="text-green-400 font-bold">[SUCESSO] Wordlist Otimizada!</div>`;
                        this.canNext2 = true;
                    }
                    this.feedback2 = html;
                },
                // EXERCICIO 3
                feedback3: '',
                completed: false,
                checkObject(isTarget, objectName) {
                    if(isTarget) {
                        this.feedback3 = '<span class="text-green-400 font-bold text-lg">[ALVO CONFIRMADO]</span><br>Post-it encontrado colado atrás do monitor. Salvando progresso...';
                        this.completed = true;
                        
                        // LARAVEL: Chama a função que salva no banco
                        this.saveProgress();

                    } else {
                        const responses = ["Apenas um objeto comum.", "Nada crítico aqui.", "Tente olhar onde você esconderia uma senha."];
                        const randomMsg = responses[Math.floor(Math.random() * responses.length)];
                        this.feedback3 = `<span class="text-yellow-500">[SCANNING: ${objectName}]</span><br>${randomMsg}`;
                    }
                },
                
                // Substitua a função saveProgress antiga por esta:
                saveProgress() {
                    fetch("{{ route('labs.engenharia-social.complete') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ completed: true })
                    })
                    .then(response => {
                        // AQUI ESTÁ A MUDANÇA:
                        // Não tentamos ler JSON. Apenas perguntamos: "Deu certo o HTTP?"
                        if (response.ok) {
                            // Sucesso (Status 200, 201, 204...)
                            console.log('Status HTTP:', response.status);
                            this.feedback3 += '<br><span class="text-xs text-blue-400 mt-2 block">[SYNC] Progresso registrado no servidor.</span>';
                        } else {
                            // Erro (Status 400, 404, 500...)
                            // Lançamos um erro para cair no .catch lá embaixo
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