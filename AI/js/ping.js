"use strict";
      var socket;

      status.textContent = "Not Connected";
      url.value = "ws://96.47.236.85:8080";
      close.disabled = true;
      send.disabled = true;
      text.value = "";
      socket.send(text.value);