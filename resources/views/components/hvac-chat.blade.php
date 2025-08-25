<style>
  .hvac-chat-fab {
    position: fixed; bottom: 20px; right: 20px; z-index: 9999;
    width: 56px; height: 56px; border-radius: 50%;
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
  💬
</button>

<div class="hvac-chat-panel" id="hvacPanel" role="dialog" aria-modal="true" aria-label="Chat de soporte HVACopcost">
  <div class="hvac-chat-header">
    <span>Soporte técnico inteligente HVACopcost</span>
    <button type="button" id="hvacClose" style="background:transparent;border:none;color:#fff;font-size:18px;cursor:pointer;">✕</button>
  </div>
  <div class="hvac-chat-body" id="hvacBody">
    <div style="margin-bottom:6px;color:#64748b;font-size:12px;">Sugerencias:</div>
    <div id="hvacChips"></div>
  </div>
  <div class="hvac-chat-footer">
    <input id="hvacInput" type="text" placeholder="Escribe tu pregunta de HVAC..." style="flex:1;padding:10px;border:1px solid #e5e7eb;border-radius:8px;">
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
  const chips = document.getElementById('hvacChips');

  const suggested = <?php echo json_encode(config('hvac.suggested_questions', [])); ?>;

  function toggle(open){
    panel.style.display = open ? 'block' : 'none';
    if (open) { input.focus(); }
  }

  function appendMessage(text, who){
    const wrap = document.createElement('div');
    wrap.className = 'hvac-msg ' + (who === 'user' ? 'hvac-user' : 'hvac-bot');
    const bubble = document.createElement('div');
    bubble.className = 'hvac-bubble';
    bubble.textContent = text;
    wrap.appendChild(bubble);
    body.appendChild(wrap);
    body.scrollTop = body.scrollHeight;
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
        send.click();
      };
      chips.appendChild(c);
    });
  }

  async function ask(text){
    appendMessage(text, 'user');
    setLoading(true);

    try {
      const res = await fetch('<?php echo url('/api/chatgpt-support'); ?>', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          // Si usas Sanctum/CSRF en web.php, añade X-CSRF-TOKEN
        },
        body: JSON.stringify({ message: text })
      });

      const data = await res.json();
      removeLoading();
      if (data.reply) {
        appendMessage(data.reply, 'bot');
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
  });
  input.addEventListener('keydown', (e)=>{
    if (e.key === 'Enter') { send.click(); }
  });

  renderChips();
})();
</script>
