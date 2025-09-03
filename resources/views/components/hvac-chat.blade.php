<style>
  .hvac-chat-fab {
    position: fixed; bottom: 20px; right: 20px; z-index: 9999;
    width: 80px; height: 80px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 16px rgba(0,0,0,.2); cursor: pointer; border: none;
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
</style>

<button type="button" class="hvac-chat-fab" id="hvacFab" title="Soporte técnico inteligente HVACopcost" aria-label="Abrir chat" style="background:#0ea5e9;color:#fff;">
   <svg class="m-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M256 48C141.1 48 48 141.1 48 256l0 40c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-40C0 114.6 114.6 0 256 0S512 114.6 512 256l0 144.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24l-32 0c-26.5 0-48-21.5-48-48s21.5-48 48-48l32 0c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40L464 256c0-114.9-93.1-208-208-208zM144 208l16 0c17.7 0 32 14.3 32 32l0 112c0 17.7-14.3 32-32 32l-16 0c-35.3 0-64-28.7-64-64l0-48c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64l0 48c0 35.3-28.7 64-64 64l-16 0c-17.7 0-32-14.3-32-32l0-112c0-17.7 14.3-32 32-32l16 0z"/></svg>
</button>

<div class="hvac-chat-panel" id="hvacPanel" role="dialog" aria-modal="true" aria-label="Chat de soporte HVACopcost">
  <div class="hvac-chat-header">
    <span>Soporte técnico inteligente HVACopcost</span>
    <button type="button" id="hvacClose" style="background:transparent;border:none;color:#fff;font-size:18px;cursor:pointer;">✕</button>
  </div>
  <div class="hvac-chat-body" id="hvacBody">
   {{--  <div style="margin-bottom:6px;color:#64748b;font-size:12px;">Sugerencias:</div> --}}
    <div id="hvacChips"></div>
  </div>
  <div class="hvac-chat-footer">
    <input id="hvacInput" type="text" placeholder="Escribe tu pregunta de HVAC..." style="flex:1;padding:10px;border:1px solid #e5e7eb;border-radius:8px;">
    <button type="button" id="hvacMic" style="padding:10px 14px;border:none;background:#22c55e;color:#fff;border-radius:8px;cursor:pointer;">🎤</button>
    <button type="button" id="hvacSend" style="padding:10px 14px;border:none;background:#0ea5e9;color:#fff;border-radius:8px;cursor:pointer;">Enviar</button>
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
      playBtn.textContent = "🔊";
      playBtn.style.marginLeft = "6px";
      playBtn.style.border = "none";
      playBtn.style.background = "transparent";
      playBtn.style.cursor = "pointer";
      playBtn.onclick = async () => playAudio(text);
      wrap.appendChild(playBtn);

      // ✅ Y si viene del micrófono, lo reproducimos automáticamente
      if (autoPlay) playAudio(text);
    }

    body.appendChild(wrap);
    body.scrollTop = body.scrollHeight;
  }

  async function playAudio(text){
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

  async function ask(text){
    appendMessage(text, 'user');
    setLoading(true);

    try {
      const res = await fetch('<?php echo url('/api/hvac/chat'); ?>', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message: text })
      });

      const data = await res.json();
      removeLoading();

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

  fab.addEventListener('click', ()=> toggle(true));
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

  renderChips();
})();

</script>
