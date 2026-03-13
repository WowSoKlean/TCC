<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> 
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-slate-200">
                <div class="p-6 text-gray-900">
                    Bem-vindo, <strong>{{ Auth::user()->name }}</strong>!
                </div>
            </div>

            <div class="mt-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <h3 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                    Seu Progresso
                </h3>

                <div class="w-full md:w-1/3 bg-white p-4 rounded-lg shadow-sm border border-slate-200">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-semibold text-slate-600">Conclusão do Curso</span>
                        <span class="text-sm font-bold text-blue-600">{{ round($globalProgress) }}%</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-3">
                        <div class="bg-blue-600 h-3 rounded-full transition-all duration-1000 ease-out" 
                             style="width: {{ $globalProgress }}%"></div>
                    </div>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-white p-6 rounded-lg shadow-lg border border-slate-200 flex flex-col items-center text-center relative overflow-hidden group">
                    <div class="absolute top-4 right-4">
                        @if($status['engenharia_social'])
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full border border-green-200">
                                ✓ FEITO
                            </span>
                        @else
                            <span class="bg-slate-100 text-slate-500 text-xs font-bold px-3 py-1 rounded-full border border-slate-200">
                                A FAZER
                            </span>
                        @endif
                    </div>

                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full {{ $status['engenharia_social'] ? 'bg-green-100 text-green-600' : 'bg-blue-100 text-blue-600' }} mb-4 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                    </div>
                    
                    <h4 class="text-xl font-semibold text-slate-900">Engenharia Social</h4>
                    <p class="mt-2 text-slate-600 flex-grow text-sm leading-relaxed px-2">
                        Mergulhe na psicologia do ataque. Aprenda técnicas de manipulação, coleta de dados (OSINT) e Pretexting para identificar como o fator humano é explorado.
                    </p>

                    <a href="{{ route('labs.engenharia-social') }}" 
                       class="mt-6 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $status['engenharia_social'] ? 'bg-slate-600 hover:bg-slate-700 focus:ring-slate-500' : 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500' }}">
                        {{ $status['engenharia_social'] ? 'Revisar Lab' : 'Iniciar Lab' }}
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg border border-slate-200 flex flex-col items-center text-center relative overflow-hidden">
                    <div class="absolute top-4 right-4">
                        @if($status['phishing'])
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full border border-green-200">✓ FEITO</span>
                        @else
                            <span class="bg-slate-100 text-slate-500 text-xs font-bold px-3 py-1 rounded-full border border-slate-200">A FAZER</span>
                        @endif
                    </div>

                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full {{ $status['phishing'] ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    
                    <h4 class="text-xl font-semibold text-slate-900">Phishing</h4>
                    <p class="mt-2 text-slate-600 flex-grow text-sm leading-relaxed px-2">
                        Identifique vetores de ataque em e-mails e sites clonados. Aprenda a analisar cabeçalhos, detectar Spear Phishing e prevenir o roubo de credenciais.
                    </p>

                    <a href="{{ route('labs.phishing') }}" class="mt-6 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white {{ $status['phishing'] ? 'bg-slate-600 hover:bg-slate-700' : 'bg-red-600 hover:bg-red-700' }}">
                        {{ $status['phishing'] ? 'Revisar Lab' : 'Iniciar Lab' }}
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg border border-slate-200 flex flex-col items-center text-center relative overflow-hidden">
                    <div class="absolute top-4 right-4">
                        @if($status['malware'])
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full border border-green-200">✓ FEITO</span>
                        @else
                            <span class="bg-slate-100 text-slate-500 text-xs font-bold px-3 py-1 rounded-full border border-slate-200">A FAZER</span>
                        @endif
                    </div>

                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full {{ $status['malware'] ? 'bg-green-100 text-green-600' : 'bg-emerald-100 text-emerald-600' }} mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                    </div>
                    
                    <h4 class="text-xl font-semibold text-slate-900">Malware</h4>
                    <p class="mt-2 text-slate-600 flex-grow text-sm leading-relaxed px-2">
                        Realize análises estáticas e dinâmicas em ambiente seguro. Entenda o funcionamento de Keyloggers e Spywares, extraindo Indicadores de Comprometimento (IOCs).
                    </p>

                    <a href="{{ route('labs.malware') }}" class="mt-6 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white {{ $status['malware'] ? 'bg-slate-600 hover:bg-slate-700' : 'bg-emerald-600 hover:bg-emerald-700' }}">
                        {{ $status['malware'] ? 'Revisar Lab' : 'Iniciar Lab' }}
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg border border-slate-200 flex flex-col items-center text-center relative overflow-hidden">
                    <div class="absolute top-4 right-4">
                        @if($status['ransomware'])
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full border border-green-200">✓ FEITO</span>
                        @else
                            <span class="bg-slate-100 text-slate-500 text-xs font-bold px-3 py-1 rounded-full border border-slate-200">A FAZER</span>
                        @endif
                    </div>

                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full {{ $status['ransomware'] ? 'bg-green-100 text-green-600' : 'bg-purple-100 text-purple-600' }} mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </div>
                    
                    <h4 class="text-xl font-semibold text-slate-900">Ransomware</h4>
                    <p class="mt-2 text-slate-600 flex-grow text-sm leading-relaxed px-2">
                        Simule o ciclo de vida de um ataque de extorsão. Compreenda a criptografia de arquivos, modelos de RaaS e as táticas críticas de resposta e recuperação.
                    </p>

                    <a href="{{ route('labs.ransomware') }}" class="mt-6 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white {{ $status['ransomware'] ? 'bg-slate-600 hover:bg-slate-700' : 'bg-purple-600 hover:bg-purple-700' }}">
                        {{ $status['ransomware'] ? 'Revisar Lab' : 'Iniciar Lab' }}
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>