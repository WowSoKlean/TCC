@props(['activeSlide' => 0])

<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }
</style>

<section class="py-12 bg-[#020617] border-b border-slate-800 px-6" id="ttps-section" data-start-index="{{ $activeSlide }}">
    <div class="container mx-auto">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold tracking-tight text-white sm:text-3xl">
                A Anatomia do Ataque
            </h2>
            <p class="mt-2 text-base text-slate-400 max-w-2xl mx-auto">
                Contextualize o laboratório abaixo dentro da Cadeia de Intrusão.
            </p>
        </div>

        <div class="relative bg-slate-900 rounded-xl shadow-xl border border-slate-800 overflow-hidden min-h-[400px] flex flex-col justify-center">
            
            <div id="ttp-slides-container" class="relative w-full h-full p-8 md:p-12">

                <div class="ttp-slide hidden animate-fade-in">
                    <div class="border-l-4 border-blue-500 pl-6">
                        <span class="text-blue-500 font-bold tracking-widest uppercase text-xs mb-2 block">Fase 1: Reconhecimento & Pretexto</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-4">Engenharia Social</h3>
                        <div class="space-y-4 text-base md:text-lg text-slate-400 leading-relaxed text-justify">
                            <p>
                                A <strong class="text-blue-400">Engenharia Social</strong> é a arte de manipular pessoas para que divulguem informações confidenciais. Na cadeia de intrusão, ela atua predominantemente nas fases iniciais de <em>Reconnaissance</em> (Reconhecimento) e <em>Weaponization</em> (Armamentização).
                            </p>
                            <p>
                                Neste projeto, não focamos apenas na tecnologia, mas no "Hacking Humano". Exploramos como atacantes utilizam princípios de autoridade, urgência e escassez para contornar as defesas lógicas mais robustas.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="ttp-slide hidden animate-fade-in">
                    <div class="border-l-4 border-red-500 pl-6">
                        <span class="text-red-500 font-bold tracking-widest uppercase text-xs mb-2 block">Fase 2: Entrega (Delivery)</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-4">Phishing & Spear Phishing</h3>
                        <div class="space-y-4 text-base md:text-lg text-slate-400 leading-relaxed text-justify">
                            <p>
                                O <strong class="text-red-400">Phishing</strong> é o vetor de entrega mais comum na atualidade. Ele representa o momento em que o "pacote malicioso" chega ao alvo, geralmente via e-mail, SMS (Smishing) ou redes sociais.
                            </p>
                            <p>
                                Em nossos laboratórios, simulamos campanhas controladas de Mass Phishing e reforço em indicadores técnicos que indicam fraudes, diferenciando-o do perigoso <em>Spear Phishing</em>.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="ttp-slide hidden animate-fade-in">
                    <div class="border-l-4 border-emerald-500 pl-6">
                        <span class="text-emerald-500 font-bold tracking-widest uppercase text-xs mb-2 block">Fase 3: Exploração & Instalação</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-4">Malware (Software Malicioso)</h3>
                        <div class="space-y-4 text-base md:text-lg text-slate-400 leading-relaxed text-justify">
                            <p>
                                Uma vez que o usuário interage com o phishing, o <strong class="text-emerald-400">Malware</strong> entra em cena. Isso abrange a execução de código (Exploitation) e a persistência no sistema (Installation).
                            </p>
                            <p>
                                Analisamos diferentes cargas úteis (payloads): desde <em>Keyloggers</em> que capturam digitação até <em>Zero-day</em>. O foco aqui é entender como o Malware opera após a autorização da vítima.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="ttp-slide hidden animate-fade-in">
                    <div class="border-l-4 border-purple-500 pl-6">
                        <span class="text-purple-500 font-bold tracking-widest uppercase text-xs mb-2 block">Fase 4: Ação nos Objetivos</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-4">Ransomware</h3>
                        <div class="space-y-4 text-base md:text-lg text-slate-400 leading-relaxed text-justify">
                            <p>
                                O estágio final e mais destrutivo: <strong class="text-purple-400">Ransomware</strong>. Aqui, o objetivo do atacante é negar o acesso aos dados através de criptografia forte, exigindo pagamento para o resgate.
                            </p>
                            <p>
                                Estudamos a mecânica do Ransomware moderno, que não apenas criptografa, mas também exfiltra informações para extorsão dupla.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="absolute bottom-6 left-0 right-0 flex justify-center space-x-3">
                <button class="ttp-dot w-3 h-3 rounded-full transition-all" onclick="manualTtpSlide(0)"></button>
                <button class="ttp-dot w-3 h-3 rounded-full transition-all" onclick="manualTtpSlide(1)"></button>
                <button class="ttp-dot w-3 h-3 rounded-full transition-all" onclick="manualTtpSlide(2)"></button>
                <button class="ttp-dot w-3 h-3 rounded-full transition-all" onclick="manualTtpSlide(3)"></button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ttpSlides = document.querySelectorAll('.ttp-slide');
            const ttpDots = document.querySelectorAll('.ttp-dot');
            const section = document.getElementById('ttps-section');
            
            // LER O VALOR INICIAL DO HTML. Se não achar, usa 0.
            let currentTtpIndex = parseInt(section.getAttribute('data-start-index')) || 0;
            let ttpInterval;

            const dotColors = [
                'bg-blue-500',    // Slide 0
                'bg-red-500',     // Slide 1
                'bg-emerald-500', // Slide 2
                'bg-purple-500'   // Slide 3
            ];

            const dotShadows = [
                'shadow-[0_0_10px_rgba(59,130,246,0.5)]',
                'shadow-[0_0_10px_rgba(239,68,68,0.5)]',
                'shadow-[0_0_10px_rgba(16,185,129,0.5)]',
                'shadow-[0_0_10px_rgba(168,85,247,0.5)]'
            ];

            window.manualTtpSlide = function(index) {
                currentTtpIndex = index;
                updateTtpInterface();
                resetTtpTimer(); 
            }

            function updateTtpInterface() {
                ttpSlides.forEach((slide, index) => {
                    if (index === currentTtpIndex) {
                        slide.classList.remove('hidden');
                        slide.classList.add('block');
                    } else {
                        slide.classList.add('hidden');
                        slide.classList.remove('block');
                    }
                });

                ttpDots.forEach((dot, index) => {
                    dot.classList.remove(
                        'bg-slate-700', 'hover:bg-slate-600', 'scale-125', 
                        ...dotColors, ...dotShadows
                    );

                    if (index === currentTtpIndex) {
                        dot.classList.add(dotColors[index], dotShadows[index], 'scale-125');
                    } else {
                        dot.classList.add('bg-slate-700', 'hover:bg-slate-600');
                    }
                });
            }

            function nextTtpSlide() {
                currentTtpIndex = (currentTtpIndex + 1) % ttpSlides.length;
                updateTtpInterface();
            }

            function startTtpTimer() {
                if(ttpInterval) clearInterval(ttpInterval);
                ttpInterval = setInterval(nextTtpSlide, 20000);
            }

            function resetTtpTimer() {
                clearInterval(ttpInterval);
                startTtpTimer();
            }

            // Inicia imediatamente com o índice correto
            updateTtpInterface();
            startTtpTimer();
        });
    </script>
</section>