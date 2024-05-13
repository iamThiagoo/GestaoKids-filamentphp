<div class="relative w-full">
    <!-- component -->
    <div class="fixed z-30 cursor-pointer opacity-90" style="bottom: 20px; right: 20px;" title="Abrir ChatGPT">
        <div class="relative flex items-center justify-center w-12 h-12 p-1 text-white rounded-full" style="background-color: {{ $panelHidden ? '#888' : 'rgb(16, 163, 127)' }};" wire:click="$toggle('panelHidden')" id="btn-chat">
            <x-filament-chatgpt-bot::chatgpt-svg />
        </div>
    </div>
    <div class="flex-1 p-2 sm:p-6 justify-between flex flex-col h-screen border border-solid border-blue-500 fixed {{ $winPosition=="left"?"left-0":"right-0" }} bottom-0 bg-white shadow z-30 {{ $panelHidden ? 'hidden' : '' }}" style="min-width: 500px; {{ $winWidth }}" id="chat-window">
        <div class="flex justify-between py-3 border-b-2 border-gray-200 sm:items-center" style="padding-top: 0.65rem;">
            <div class="relative flex items-center space-x-4">
                <div class="relative" style="margin-right: 10px">
                    <span class="absolute bottom-0 right-0 text-green-500">
                        <svg width="20" height="20">
                        <circle cx="8" cy="8" r="8" fill="currentColor"></circle>
                        </svg>
                    </span>
                    <div class="relative h-[30px] w-[30px] p-1 rounded-sm text-white flex items-center justify-center" style="background-color: rgb(16, 163, 127); ">
                        <x-filament-chatgpt-bot::chatgpt-svg />
                    </div>
                </div>
                {{-- <div class="flex flex-col leading-tight">
                    <div class="flex items-center mt-1 text-2xl">
                        <span class="mr-3 text-gray-700">{{ $name }}</span>
                    </div>
                    <span class="text-lg text-gray-600"></span>
                </div> --}}
                ChatGPT
            </div>
            <div class="flex items-center space-x-2">
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-gray-500 transition duration-500 ease-in-out border rounded-lg hover:bg-gray-300 focus:outline-none" wire:click="resetSession()" title="Limpar Chat">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                      </svg>
                </button>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-gray-500 transition duration-500 ease-in-out border rounded-lg hover:bg-gray-300 focus:outline-none" wire:click="changeWinWidth()" title="Ampliar/Reduzir Chat" style="margin-left:0.25rem;">
                    @if($winWidth!="width:100%;")
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 9V4.5M9 9H4.5M9 9L3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5l5.25 5.25" />
                    </svg>
                    @endif
                </button>
                <button type="button" class="inline-flex items-center justify-center rounded-lg border h-8 w-8 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none {{ $showPositionBtn?'':'hidden' }}" wire:click="changeWinPosition()" title="{{ $winPosition=='left' ? 'Mudar painel para Direita' : 'Mudar painel para Esquerda' }}" style="margin-left:0.25rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                    </svg>
                </button>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-gray-500 transition duration-500 ease-in-out border rounded-lg hover:bg-gray-300 focus:outline-none" wire:click="$toggle('panelHidden')" title="Fechar Chat" style="margin-left:0.25rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                      </svg>
                </button>
            </div>
        </div>
        <div>
            <div id="messages" style="padding: 20px;" class="flex flex-col p-3 space-y-4 overflow-y-auto scrolling-touch scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2">
                @foreach($messages as $message)
                    @if($message['role'] !== 'system')
                    @if($message['role'] == "assistant")
                        <div class="chat-message">
                            <div class="flex items-end">
                                <div class="flex flex-col items-start order-2 mx-2 space-y-2 text-xs">
                                    <div>
                                        <div class="block px-4 py-2 text-gray-600 bg-gray-300 rounded-lg rounded-bl-none" style="font-size: 14.5px; line-height: 1.3;">
                                            @isset($message['content']){!! \Illuminate\Mail\Markdown::parse($message['content']) !!}@endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="relative flex items-center justify-center w-6 h-6 p-1 text-white rounded-full" style="background-color: rgb(16, 163, 127);">
                                    <x-filament-chatgpt-bot::chatgpt-svg />
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="chat-message">
                            <div class="flex items-end justify-end">
                                <div class="flex flex-col items-end order-1 max-w-xs mx-2 space-y-2 text-xs">
                                    <div>
                                        <div class="block px-4 py-2 text-white bg-blue-600 rounded-lg rounded-br-none" style="font-size: 14.5px; line-height: 1.3;">
                                            {!! \Illuminate\Mail\Markdown::parse($message['content']) !!}
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $name = auth()->user()? substr(auth()->user()->name,0,1):"匿";
                                    $avatar = "https://ui-avatars.com/api/?name={$name}&color=FFFFFF&background=111827'";
                                @endphp
                                <img src="{{ $avatar }}" alt="Meu perfil" class="order-2 w-6 h-6 rounded-full">
                            </div>
                        </div>
                    @endif
                    @endif
                @endforeach
            </div>
            <div class="px-4 pt-4 mb-2 border-t-2 border-gray-200 sm:mb-0">
                <div class="py-2 text-sm" style="color:rgb(11 175 79); padding: 0px 0 18px 0;" wire:loading wire:target="sendMessage">Enviando mensagem...</div>
                <div class="relative flex flex-col flex-grow w-full py-2 bg-gray-200 rounded-md shadow md:py-3 md:pl-4">
                    <textarea wire:model.defer="question" tabindex="0" data-id="root" style="max-height: 200px; height: 24px; " placeholder="Como posso te ajudar?" class="w-full p-0 pl-2 m-0 bg-transparent border-0 resize-none pr-7 focus:ring-0 focus:outline-none focus:placeholder-gray-400 md:pl-0" id="chat-input"></textarea>
                    <button wire:click="sendMessage" wire:loading.attr="disabled" class="absolute p-1 rounded-md text-gray-500 bottom-1.5 md:bottom-2.5 hover:bg-gray-100 enabled:dark:hover:text-gray-400 disabled:hover:bg-transparent right-1 md:right-2 disabled:opacity-40" title="Enviar mensagem"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg></button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .opacity-90:hover {
            opacity: .9;
        }
        .scrollbar-w-2::-webkit-scrollbar {
            width: 0.5rem;
            height: 0.5rem;
        }

        .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity));
        }

        .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
            --bg-opacity: 1;
            background-color: #edf2f7;
            background-color: rgba(237, 242, 247, var(--bg-opacity));
        }

        .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
            border-radius: 0.25rem;
        }

        /* classes did not compile in Filamentphp  */
        .bg-blue-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(37 99 235 / var(--tw-bg-opacity));
        }
        .order-2 {
            order: 2;
        }
        .mx-2 {
            margin-left: 0.5rem;
            margin-right: 0.5rem;
        }
        .mr-3{
            margin-left:0.75rem;
        }
        .border-0{
            border-width:0px;
        }
        .border-b-2 {
            border-bottom-width: 2px;
        }
        .border-t-2 {
            border-top-width: 2px;
        }
        .border-2{
            border-width: 2px;
        }
        .border-blue-500{
            --tw-border-opacity: 1;
            border-color: rgb(59 130 246 / var(--tw-border-opacity));
        }
        .rounded-br-right{
            border-bottom-right-radius: 0px;
        }
        .rounded-sm{
            border-raidus: 0.125rem;
        }
        .p-1{
            padding:0.25rem;
        }
        .pl-1{
            padding-left:0.25rem;
        }
        .pl-2{
            padding-left:0.5rem;
        }
        .pt-4{
            padding-top: 1rem;
        }
        .h-\[30px\]{
            height: 30px;
        }
        .w-\[30px\]{
            width: 30px;
        }
        .right-0{
            right:0;
        }
        .left-0{
            lef:0;
        }
        .right-1{
            right: 0.25rem;
        }
        .md\:right-2{
            right: 0.5rem
        }

    </style>

    <script>
        const el = document.getElementById('messages')
        window.onload = function(){
            el.scrollTop = el.scrollHeight
        }

        var textarea = document.querySelector('#chat-input');

        textarea.addEventListener("input", function(e) {
            this.style.height = "inherit";
            this.style.height = `${this.scrollHeight}px`;
        });

        window.addEventListener('sendmessage', event => {
            el.scrollTop = el.scrollHeight
        })

    </script>

</div>
