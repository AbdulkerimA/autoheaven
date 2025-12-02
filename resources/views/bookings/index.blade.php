<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Auto Heaven — Manage Booking</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* -----------------------------
       Base tokens + animations
       (kept consistent with your reference)
       ----------------------------- */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

    :root {
      --color-primary: #111827;
      --color-accent: #facc15;
      --color-warm-amber: #f59e0b;
      --color-light-bg: #f9fafb;
      --color-light-text: #374151;
      --color-dark-bg: #0f172a;
      --color-dark-text: #f9fafb;
      --color-dark-slate: #1e293b;
      --color-gray: #d1d5db;
      --color-cool-gray: #9ca3af;

      /* Option 1 (step colors): */
      --step-accepted: #3b82f6;
      /* blue */
      --step-onway: #2563eb;
      /* darker blue */
      --step-picked: #facc15;
      /* yellow */
      --step-inuse: #22c55e;
      /* green */
      --step-returned: #166534;
      /* dark green */
    }

    /* Animations */
    @keyframes fadeIn {
      0% {
        opacity: 0
      }

      100% {
        opacity: 1
      }
    }

    @keyframes fadeUp {
      0% {
        opacity: 0;
        transform: translateY(30px)
      }

      100% {
        opacity: 1;
        transform: translateY(0)
      }
    }

    @keyframes slideUp {
      0% {
        opacity: 0;
        transform: translateY(20px)
      }

      100% {
        opacity: 1;
        transform: translateY(0)
      }
    }

    @keyframes scaleIn {
      0% {
        opacity: 0;
        transform: scale(.95)
      }

      100% {
        opacity: 1;
        transform: scale(1)
      }
    }

    @keyframes pulse {

      0%,
      100% {
        opacity: 1
      }

      50% {
        opacity: .8
      }
    }

    .animate-fade-in {
      animation: fadeIn .8s ease-out
    }

    .animate-fade-up {
      animation: fadeUp .8s ease-out
    }

    .animate-slide-up {
      animation: slideUp .6s ease-out
    }

    .animate-scale-in {
      animation: scaleIn .45s ease-out
    }

    .animate-pulse {
      animation: pulse 2s infinite
    }

    /* Structural / visual pieces from your reference */
    body {
      font-family: Inter, system-ui, sans-serif;
      background: var(--color-dark-bg);
      color: var(--color-dark-text);
      min-height: 100%;
      box-sizing: border-box
    }

    .hero-bg {
      background: linear-gradient(135deg, rgba(17, 24, 39, 0.9) 0%, rgba(30, 41, 59, 0.85) 50%, rgba(15, 23, 42, 0.9) 100%),
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 300"><rect width="1200" height="300" fill="%230f172a"/><path d="M0,150 Q300,75 600,150 T1200,150 L1200,300 L0,300 Z" fill="%231f2937" opacity="0.4"/></svg>');
      background-size: cover;
      background-position: center;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--color-accent), var(--color-warm-amber));
      color: var(--color-primary);
      transition: all .25s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px) scale(1.02);
      box-shadow: 0 8px 25px rgba(250, 204, 21, .35)
    }

    .btn-secondary {
      background: transparent;
      border: 1px solid rgba(250, 204, 21, .18);
      color: var(--color-accent);
      transition: all .2s ease;
    }

    .btn-secondary:hover {
      background: rgba(250, 204, 21, .07);
      transform: translateY(-1px)
    }

    .card {
      background: var(--color-dark-slate);
      border: 1px solid rgba(250, 204, 21, .08);
      border-radius: 14px;
      padding: 18px;
      transition: all .25s ease;
    }

    .card:hover {
      box-shadow: 0 10px 30px rgba(0, 0, 0, .25);
      transform: translateY(-3px)
    }

    .status-badge {
      padding: 6px 12px;
      border-radius: 999px;
      font-weight: 600;
      font-size: 12px
    }

    .status-accepted {
      background: rgba(59, 130, 246, .12);
      color: var(--step-accepted)
    }

    .status-onway {
      background: rgba(37, 99, 235, .12);
      color: var(--step-onway)
    }

    .status-picked {
      background: rgba(250, 204, 21, .12);
      color: var(--step-picked)
    }

    .status-inuse {
      background: rgba(34, 197, 94, .12);
      color: var(--step-inuse)
    }

    .status-returned {
      background: rgba(22, 101, 52, .12);
      color: var(--step-returned)
    }

    .progress-step {
      display: flex;
      align-items: center;
      gap: 12px
    }

    .step-circle {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: #fff;
      flex-shrink: 0
    }

    .step-line {
      height: 4px;
      flex: 1;
      border-radius: 8px;
      background: rgba(255, 255, 255, .06)
    }

    .step-active {
      box-shadow: 0 8px 20px rgba(0, 0, 0, .3)
    }

    .profile-photo {
      width: 96px;
      height: 96px;
      border-radius: 50%;
      border: 3px solid var(--color-accent);
      object-fit: cover
    }

    .mini-chart {
      height: 72px;
      border-radius: 10px;
      padding: 8px;
      background: linear-gradient(135deg, rgba(250, 204, 21, .06), rgba(245, 158, 11, .02))
    }

    .danger {
      background: linear-gradient(135deg, #ef4444, #dc2626);
      color: white
    }

    .muted {
      color: var(--color-gray);
      font-size: .95rem
    }

    /* small responsive tweaks */
    @media (max-width:1024px) {
      .hero-grid {
        grid-template-columns: 1fr
      }

      .profile-photo {
        width: 88px;
        height: 88px
      }
    }
  </style>
</head>

<body>

  <!-- Header (kept similar to original) -->
  <x-header class="bg-gray-900" />

  <livewire:track-booking />

  <!-- Modal container -->
  <div id="modalRoot"></div>

  {{-- footer --}}
  <x-footer />

  <script>
    // Page logic: status progression, actions, timeline updates
    (function () {
      // State machine for statuses
      const statuses = ['Accepted', 'On the Way', 'Picked Up', 'In Use', 'Returned'];
      let currentIndex = 1; // starting at "On the Way" as per example

      // DOM references
      const statusBadge = document.getElementById('statusBadge');
      const currentStateText = document.getElementById('currentStateText');
      const stepAccepted = document.getElementById('stepAccepted');
      const stepOnway = document.getElementById('stepOnway');
      const stepPicked = document.getElementById('stepPicked');
      const stepInuse = document.getElementById('stepInuse');
      const stepReturned = document.getElementById('stepReturned');

      const line1 = document.getElementById('line1');
      const line2 = document.getElementById('line2');
      const line3 = document.getElementById('line3');
      const line4 = document.getElementById('line4');

      const acceptedTime = document.getElementById('acceptedTime');
      const onwayTime = document.getElementById('onwayTime');
      const pickedTime = document.getElementById('pickedTime');
      const inuseTime = document.getElementById('inuseTime');
      const returnedTime = document.getElementById('returnedTime');

      const liveDot = document.getElementById('liveDot');
      const liveText = document.getElementById('liveText');

      const distanceRem = document.getElementById('distanceRem');
      const eta = document.getElementById('eta');

      const lastUpdated = document.getElementById('lastUpdated');
      const timeline = document.getElementById('timeline');

      // utility: get timestamp string
      function timeLabel() {
        const d = new Date();
        return d.toLocaleString();
      }

      // initialize visuals
      function render() {
        const s = statuses[currentIndex];
        statusBadge.textContent = s;
        currentStateText.textContent = s;

        // reset colors / classes
        [stepAccepted, stepOnway, stepPicked, stepInuse, stepReturned].forEach(el => {
          el.classList.remove('step-active');
          el.style.opacity = '0.35';
        });
        [line1, line2, line3, line4].forEach(l => l.style.background = 'rgba(255,255,255,.06)');

        // Activate completed steps up to currentIndex
        for (let i = 0; i <= currentIndex; i++) {
          const el = [stepAccepted, stepOnway, stepPicked, stepInuse, stepReturned][i];
          el.classList.add('step-active');
          el.style.opacity = '1';
        }
        // style connecting lines for completed segments
        if (currentIndex >= 1) line1.style.background = 'linear-gradient(90deg, var(--step-accepted), var(--step-onway))';
        if (currentIndex >= 2) line2.style.background = 'linear-gradient(90deg, var(--step-onway), var(--step-picked))';
        if (currentIndex >= 3) line3.style.background = 'linear-gradient(90deg, var(--step-picked), var(--step-inuse))';
        if (currentIndex >= 4) line4.style.background = 'linear-gradient(90deg, var(--step-inuse), var(--step-returned))';

        // set times for steps that have been reached
        const now = timeLabel();
        if (currentIndex >= 0) acceptedTime.textContent = 'Dec 20';
        onwayTime.textContent = currentIndex >= 1 ? now.split(',')[0] : '—';
        pickedTime.textContent = currentIndex >= 2 ? now.split(',')[0] : '—';
        inuseTime.textContent = currentIndex >= 3 ? now.split(',')[0] : '—';
        returnedTime.textContent = currentIndex >= 4 ? now.split(',')[0] : '—';

        // live status UI
        if (s === 'On the Way') { liveDot.style.background = getComputedStyle(document.documentElement).getPropertyValue('--step-onway'); liveText.textContent = 'Driver en route'; distanceRem.textContent = '14 km'; eta.textContent = '22 mins'; }
        if (s === 'Accepted') { liveDot.style.background = getComputedStyle(document.documentElement).getPropertyValue('--step-accepted'); liveText.textContent = 'Booking confirmed'; distanceRem.textContent = '—'; eta.textContent = '—'; }
        if (s === 'Picked Up') { liveDot.style.background = getComputedStyle(document.documentElement).getPropertyValue('--step-picked'); liveText.textContent = 'Car picked up'; distanceRem.textContent = '—'; eta.textContent = '—'; }
        if (s === 'In Use') { liveDot.style.background = getComputedStyle(document.documentElement).getPropertyValue('--step-inuse'); liveText.textContent = 'Enjoy your trip'; distanceRem.textContent = '—'; eta.textContent = '—'; }
        if (s === 'Returned') { liveDot.style.background = getComputedStyle(document.documentElement).getPropertyValue('--step-returned'); liveText.textContent = 'Trip completed'; distanceRem.textContent = '0 km'; eta.textContent = 'Arrived'; }

        lastUpdated.textContent = new Date().toLocaleString();
      }

      // advance state (simulate)
      document.getElementById('advanceBtn').addEventListener('click', function () {
        if (currentIndex < statuses.length - 1) {
          currentIndex++;
          const eventText = `Status changed to ${statuses[currentIndex]} — ${timeLabel()}`;
          addTimelineEvent(statuses[currentIndex], eventText);
          render();
        } else {
          showModal('Trip Complete', 'This trip has already been marked as Returned.');
        }
      });

      // refresh
      document.getElementById('refreshBtn').addEventListener('click', function () { render(); showToast('Refreshed'); });

      // quick actions
      document.getElementById('contactDriver').addEventListener('click', function () {
        showModal('Contact Driver', 'Calling +251 9XX XXX XXXX... (demo)');
      });

      document.getElementById('viewReceipt').addEventListener('click', function () {
        showModal('Receipt', 'Receipt PDF would open here (demo).');
      });

      // Request extension -> adds timeline entry + updates payment remaining
      document.getElementById('requestExtend').addEventListener('click', function () {
        showModal('Request Extension', 'Your extension request has been sent to the owner. You will be notified shortly.');
        addTimelineEvent('Extension Requested', 'Customer requested an extension — ' + timeLabel());
      });

      // Report Issue
      document.getElementById('reportIssue').addEventListener('click', function () {
        showPromptModal('Report an Issue', 'Describe the issue (tyre, engine, etc):', function (value) {
          if (value && value.trim().length) {
            addTimelineEvent('Issue Reported', value + ' — ' + timeLabel());
            showToast('Issue reported. Support will contact you.');
          } else {
            showToast('Report cancelled');
          }
        });
      });

      // Cancel Booking
      document.getElementById('cancelBooking').addEventListener('click', function () {
        showConfirmModal('Cancel Booking', 'Are you sure you want to cancel this booking? A cancellation fee may apply.', function (confirmed) {
          if (confirmed) {
            addTimelineEvent('Booking Cancelled', 'Customer cancelled booking — ' + timeLabel());
            currentIndex = 4; // mark as returned/cancelled for UI
            render();
            showModal('Cancelled', 'Your booking has been cancelled. Refund process initiated (if applicable).');
          }
        });
      });

      // timeline helper
      function addTimelineEvent(title, subtitle) {
        const el = document.createElement('div');
        el.className = 'p-3 rounded-lg';
        el.style.background = 'rgba(255,255,255,0.02)';
        el.innerHTML = `
          <div class="flex items-center justify-between">
            <div>
              <div style="font-weight:600">${title}</div>
              <div class="muted text-xs">${subtitle}</div>
            </div>
            <div class="muted text-xs">${new Date().toLocaleString()}</div>
          </div>
        `;
        timeline.insertBefore(el, timeline.firstChild);
        lastUpdated.textContent = new Date().toLocaleString();
      }

      // toast modal & modals (simple)
      function showModal(title, message) {
        const root = document.getElementById('modalRoot');
        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50 animate-fade-in';
        modal.innerHTML = `
          <div class="p-6 rounded-xl animate-scale-in border" style="background:var(--color-primary); border-color: rgba(250,204,21,.12); max-width:520px; width:96%;">
            <h3 class="text-2xl font-bold mb-3" style="color:var(--color-accent); font-family:Poppins, sans-serif">${title}</h3>
            <p class="mb-6 muted">${message.replace(/\n/g, '<br/>')}</p>
            <div class="flex justify-end gap-3">
              <button class="btn-secondary px-4 py-2 rounded-xl">Close</button>
            </div>
          </div>
        `;
        root.appendChild(modal);
        modal.querySelector('button').addEventListener('click', () => modal.remove());
      }

      function showToast(msg) {
        const el = document.createElement('div');
        el.style.position = 'fixed'; el.style.right = '16px'; el.style.bottom = '24px'; el.style.background = 'rgba(17,24,39,.95)'; el.style.color = 'white'; el.style.padding = '12px 16px'; el.style.borderRadius = '10px'; el.style.zIndex = 9999; el.style.boxShadow = '0 8px 20px rgba(0,0,0,.4)'; el.innerText = msg;
        document.body.appendChild(el);
        setTimeout(() => el.style.opacity = '0.01', 2000);
        setTimeout(() => el.remove(), 2600);
      }

      function showConfirmModal(title, message, cb) {
        const root = document.getElementById('modalRoot');
        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50 animate-fade-in';
        modal.innerHTML = `
          <div class="p-6 rounded-xl animate-scale-in border" style="background:var(--color-primary); border-color: rgba(250,204,21,.12); max-width:520px; width:96%;">
            <h3 class="text-2xl font-bold mb-3" style="color:var(--color-accent); font-family:Poppins, sans-serif">${title}</h3>
            <p class="mb-6 muted">${message}</p>
            <div class="flex justify-end gap-3">
              <button class="btn-secondary px-4 py-2 rounded-xl">No</button>
              <button class="danger px-4 py-2 rounded-xl">Yes, cancel</button>
            </div>
          </div>
        `;
        root.appendChild(modal);
        modal.querySelectorAll('button')[0].addEventListener('click', () => { cb(false); modal.remove(); });
        modal.querySelectorAll('button')[1].addEventListener('click', () => { cb(true); modal.remove(); });
      }

      function showPromptModal(title, message, cb) {
        const root = document.getElementById('modalRoot');
        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50 animate-fade-in';
        modal.innerHTML = `
          <div class="p-6 rounded-xl animate-scale-in border" style="background:var(--color-primary); border-color: rgba(250,204,21,.12); max-width:520px; width:96%;">
            <h3 class="text-2xl font-bold mb-3" style="color:var(--color-accent); font-family:Poppins, sans-serif">${title}</h3>
            <p class="mb-4 muted">${message}</p>
            <textarea id="promptInput" rows="4" style="width:100%; padding:10px; border-radius:8px; background:#0b1220; color:var(--color-dark-text); border:1px solid rgba(255,255,255,.04)"></textarea>
            <div class="flex justify-end gap-3 mt-3">
              <button class="btn-secondary px-4 py-2 rounded-xl">Cancel</button>
              <button class="btn-primary px-4 py-2 rounded-xl">Submit</button>
            </div>
          </div>
        `;
        root.appendChild(modal);
        modal.querySelector('.btn-secondary').addEventListener('click', () => { cb(null); modal.remove(); });
        modal.querySelector('.btn-primary').addEventListener('click', () => {
          const v = modal.querySelector('#promptInput').value;
          cb(v);
          modal.remove();
        });
      }

      // initial render
      render();

      // small demo: auto-update distance/eta while "On the Way"
      setInterval(() => {
        if (statuses[currentIndex] === 'On the Way') {
          const km = Math.max(0, parseInt(distanceRem.textContent) - Math.floor(Math.random() * 3));
          distanceRem.textContent = km + ' km';
          eta.textContent = (km * 2 + 10) + ' mins';
        }
      }, 3500);

    })();
  </script>
</body>

</html>