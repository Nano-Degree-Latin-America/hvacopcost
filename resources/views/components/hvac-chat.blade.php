<style>
  .hvac-chat-fab {
    position: fixed; bottom: 20px; right: 20px; z-index: 9999;
    width: 80px; height: 80px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 16px rgba(0,0,0,.2); cursor: pointer;
    border: 2px solid #1B17BB;
  }

  .hvac-chat-fab:hover {
    background: #1B17BB;
    border: 2px solid #0ea5e9;
  }

  .hvac-chat-panel {
    position: fixed; bottom: 90px; right: 20px; z-index: 9999;
    width: 360px; max-width: 92vw; height: 520px; max-height: 80vh;
    background: #fff; border-radius: 12px; box-shadow: 0 12px 40px rgba(0,0,0,.24);
    display: none; overflow: hidden;
  }
  .hvac-chat-header {
    padding: 12px 16px; background: #0ea5e9; color: #fff; font-weight: 600;
    display: flex; align-items: center; justify-content: space-between;
  }
  .hvac-chat-body {
    padding: 12px; height: calc(520px - 56px - 56px); overflow-y: auto;
    background: #f8fafc;
  }
  .hvac-msg { margin: 8px 0; max-width: 90%; }
  .hvac-user { text-align: right; margin-left: auto; }
  .hvac-bot  { text-align: left;  margin-right: auto; }
  .hvac-bubble {
    display: inline-block; padding: 10px 12px; border-radius: 10px;
    background: #e2e8f0;
  }
  .hvac-user .hvac-bubble { background: #dbeafe; }
  .hvac-chat-footer { padding: 8px; display: flex; gap: 8px; border-top: 1px solid #e5e7eb; background: #fff; }
  .hvac-chip {
    display:inline-block; padding:6px 10px; border-radius:16px; background:#eef2ff; margin:4px 6px 0 0; cursor:pointer; font-size:12px;
  }

  .hvac-button-mic{
    padding:10px 14px;border:none;background:#22c55e;color:#fff;border-radius:8px;cursor:pointer;
  }

  .hvac-button-send{
    padding:10px 14px;border:none;background:#0ea5e9;color:#fff;border-radius:8px;cursor:pointer;
  }

  .hvac-button-mic:hover{
    background:#1B17BB;
  }

  .hvac-button-send:hover{
    background:#1B17BB;
  }
</style>

<button type="button" class="hvac-chat-fab" id="hvacFab" title="Soporte técnico inteligente HVACopcost" aria-label="Abrir chat" style="background:#0ea5e9;color:#fff;">
   <svg class="m-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#ffffff" d="M256 48C141.1 48 48 141.1 48 256l0 40c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-40C0 114.6 114.6 0 256 0S512 114.6 512 256l0 144.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24l-32 0c-26.5 0-48-21.5-48-48s21.5-48 48-48l32 0c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40L464 256c0-114.9-93.1-208-208-208zM144 208l16 0c17.7 0 32 14.3 32 32l0 112c0 17.7-14.3 32-32 32l-16 0c-35.3 0-64-28.7-64-64l0-48c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64l0 48c0 35.3-28.7 64-64 64l-16 0c-17.7 0-32-14.3-32-32l0-112c0-17.7 14.3-32 32-32l16 0z"/></svg>
</button>

<div class="hvac-chat-panel border-2" id="hvacPanel" role="dialog" aria-modal="true" aria-label="Chat de soporte HVACopcost">
  <div class="hvac-chat-header">
    <span>Soporte IA HVACopcost</span>
    <button type="button" id="hvacClose" style="background:transparent;border:none;color:#fff;font-size:18px;cursor:pointer;">✕</button>
  </div>
  <div class="hvac-chat-body" id="hvacBody">
   {{--  <div style="margin-bottom:6px;color:#64748b;font-size:12px;">Sugerencias:</div> --}}
    <div id="hvacChips"></div>

  </div>
  <div class="hvac-chat-footer">
    <input id="hvacInput" type="text" placeholder="Escribe tu pregunta de HVAC..." style="flex:1;padding:10px;border:1px solid #e5e7eb;border-radius:8px;">
    {{-- <button type="button" id="hvacMic" class="hvac-button-mic">
        <i class="fas fa-microphone" style="color: #ffffff;"></i>
    </button> --}}
    <button type="button" id="hvacSend" class="hvac-button-send">Enviar</button>

  </div>
</div>

<script>
(function(){
  const fab   = document.getElementById('hvacFab');
  const panel = document.getElementById('hvacPanel');
  const close = document.getElementById('hvacClose');
  const body  = document.getElementById('hvacBody');
  const input = document.getElementById('hvacInput');
  const send  = document.getElementById('hvacSend');
  const mic   = document.getElementById('hvacMic');
  const chips = document.getElementById('hvacChips');

  const suggested = <?php echo json_encode(config('hvac.suggested_questions', [])); ?>;

  let preparedAudio = null; // 🎧 audio preparado al presionar micrófono

  function toggle(open){
    panel.style.display = open ? 'block' : 'none';
    if (open) { input.focus(); }
  }

  function appendMessage(text, who, autoPlay=false){
    const wrap = document.createElement('div');
    wrap.className = 'hvac-msg ' + (who === 'user' ? 'hvac-user' : 'hvac-bot');

    const bubble = document.createElement('div');
    bubble.className = 'hvac-bubble';
    bubble.textContent = text;
    wrap.appendChild(bubble);

    // ✅ Si es el bot, siempre agregamos botón para oír
    if (who === 'bot') {
      const playBtn = document.createElement('button');
      playBtn.innerHTML = `
  <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="icon">
    <path d="M9.75122 4.09203C9.75122 3.61482 9.21964 3.35044 8.84399 3.60277L8.77173 3.66039L6.55396 5.69262C6.05931 6.14604 5.43173 6.42255 4.7688 6.48461L4.48267 6.49828C3.52474 6.49851 2.74829 7.27565 2.74829 8.23363V11.7668C2.74829 12.7248 3.52474 13.501 4.48267 13.5012C5.24935 13.5012 5.98874 13.7889 6.55396 14.3069L8.77173 16.3401L8.84399 16.3967C9.21966 16.6493 9.75122 16.3858 9.75122 15.9084V4.09203ZM17.2483 10.0002C17.2483 8.67623 16.9128 7.43233 16.3235 6.34691L17.4924 5.71215C18.1849 6.9875 18.5784 8.4491 18.5784 10.0002C18.5783 11.5143 18.2033 12.9429 17.5413 14.1965C17.3697 14.5212 16.9675 14.6453 16.6428 14.4739C16.3182 14.3023 16.194 13.9001 16.3655 13.5754C16.9288 12.5086 17.2483 11.2927 17.2483 10.0002ZM13.9182 10.0002C13.9182 9.1174 13.6268 8.30445 13.135 7.64965L14.1985 6.85082C14.8574 7.72804 15.2483 8.81952 15.2483 10.0002L15.2336 10.3938C15.166 11.3044 14.8657 12.1515 14.3918 12.8743L14.3069 12.9797C14.0889 13.199 13.7396 13.2418 13.4709 13.0657C13.164 12.8643 13.0784 12.4528 13.2795 12.1457L13.4231 11.9084C13.6935 11.4246 13.8643 10.8776 13.9075 10.2942L13.9182 10.0002ZM13.2678 6.71801C13.5615 6.49772 13.978 6.55727 14.1985 6.85082L13.135 7.64965C12.9144 7.35599 12.9742 6.93858 13.2678 6.71801ZM16.5911 5.44555C16.9138 5.27033 17.3171 5.38949 17.4924 5.71215L16.3235 6.34691C16.1483 6.02419 16.2684 5.62081 16.5911 5.44555ZM11.0813 15.9084C11.0813 17.5226 9.22237 18.3912 7.9895 17.4202L7.87231 17.3205L5.65552 15.2873C5.33557 14.9941 4.91667 14.8313 4.48267 14.8313C2.7902 14.8311 1.41821 13.4594 1.41821 11.7668V8.23363C1.41821 6.54111 2.7902 5.16843 4.48267 5.1682L4.64478 5.16039C5.02003 5.12526 5.37552 4.96881 5.65552 4.71215L7.87231 2.67992L7.9895 2.58031C9.22237 1.60902 11.0813 2.47773 11.0813 4.09203V15.9084Z"></path>
  </svg>
`;
        playBtn.style.marginLeft = "6px";
        playBtn.style.marginTop = "2px";
        playBtn.style.border = "none";
        playBtn.style.background = "transparent";
        playBtn.style.cursor = "pointer";
        playBtn.style.color = "#444"; // color inicial

        //Tooltip
        playBtn.title = "Reproducir audio";

        // 🎨 Hover
        playBtn.onmouseover = () => {
        playBtn.style.color = "#1d4ed8"; // azul al pasar el mouse
        };
        playBtn.onmouseout = () => {
        playBtn.style.color = "#444"; // vuelve al normal
        };

      playBtn.onclick = async () => playAudio(text);
      wrap.appendChild(playBtn);

      // ✅ Y si viene del micrófono, lo reproducimos automáticamente
      if (autoPlay) playAudio(text);
    }

    body.appendChild(wrap);
    body.scrollTop = body.scrollHeight;
  }

  async function playAudio(text){  //función para reproducir audio
    try {
      const res = await fetch("<?php echo url('/api/text-to-voice'); ?>", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ text })
      });
      const data = await res.json();
      if (data.audio_url) {
        const audio = new Audio(data.audio_url);
        audio.play();

        const filename = data.audio_url.split('/').pop(); // obtener nombre de archivo para borrar
        // Cuando termine, borramos el archivo del servidor
        audio.onended = async () => {
            await fetch(`/api/delete-voice/${filename}`, { method: "DELETE" });
        };
      }
    } catch (err) {
      console.error("Error al reproducir audio", err);
    }
  }

  function setLoading(on){
    if (on) appendMessage('Escribiendo…', 'bot-loading');
  }

  function removeLoading(){
    const nodes = body.querySelectorAll('.hvac-msg');
    if (!nodes.length) return;
    const last = nodes[nodes.length-1];
    if (last && last.textContent === 'Escribiendo…') last.remove();
  }

  function renderChips(){
    chips.innerHTML = '';
    suggested.forEach(q=>{
      const c = document.createElement('span');
      c.className = 'hvac-chip';
      c.textContent = q;
      c.onclick = () => {
        input.value = q;
        lastInputWasVoice = false; // chip es texto
        send.click();
      };
      chips.appendChild(c);
    });
  }

  let userId = '{{ Auth::user()->id }}'; // 👈 este ID viene de tu backend (usuario logueado)


  async function ask(text){
    appendMessage(text, 'user');
    setLoading(true);
    try {
      const res = await fetch('<?php echo url('/api/hvac/chat'); ?>', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            message: text,
            user_id: userId,
        })
      });

      const data = await res.json();
      removeLoading();

      if (data.history) {
        body.innerHTML = "";
        data.history.forEach(msg => {
        appendMessage(msg.content, msg.sender);
        });
  }

      if (data.response) {
        appendMessage(data.response, 'bot', lastInputWasVoice); // 🚀 si fue voz → autoplay
      } else if (data.error) {
        appendMessage('Error: ' + data.error, 'bot');
      } else {
        appendMessage('No obtuve respuesta. Intenta de nuevo.', 'bot');
      }
    } catch (e) {
      removeLoading();
      appendMessage('Error de red. Intenta más tarde.', 'bot');
    }
  }

  fab.addEventListener('click', ()=> {
  toggle(true);
  loadHistory();
});

  close.addEventListener('click', ()=> toggle(false));
  send.addEventListener('click', ()=>{
    const text = (input.value || '').trim();
    if (!text) return;
    input.value = '';
    ask(text);
    lastInputWasVoice = false; // 🚀 si mandó por texto
  });
  input.addEventListener('keydown', (e)=>{
    if (e.key === 'Enter') { send.click(); }
  });

  // 🎤 Integración micrófono
  mic.addEventListener('click', ()=>{
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    if (!SpeechRecognition) {
      alert("Tu navegador no soporta reconocimiento de voz");
      return;
    }
    const recognition = new SpeechRecognition();
    recognition.lang = "es-ES";
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;

    recognition.start();
    mic.textContent = "🎙️"; // grabando

    recognition.onresult = (event) => {
      const text = event.results[0][0].transcript;
      input.value = text;
      lastInputWasVoice = true; // 🚀 marcamos voz
      send.click(); // enviamos automáticamente
    };

    recognition.onerror = (event) => {
      alert("Error al usar el micrófono: " + event.error);
    };

    recognition.onend = () => {
      mic.textContent = "🎤"; // vuelve icono normal
    };
  });

//cargamos el historial
async function loadHistory(){
  const res = await fetch(`/api/hvac/history/${userId}`);
  const history = await res.json();
  body.innerHTML = "";
  history.forEach(msg => appendMessage(msg.content, msg.role)); //contenido del historial
}

// cuando se abre el panel
fab.addEventListener('click', ()=> {
  toggle(true);
  loadHistory();
});



  renderChips();
})();

</script>

