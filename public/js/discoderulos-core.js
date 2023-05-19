console.log("***** discoderulos-core.js *****");

// Web Audio API

  // Crea un nuevo contexto de audio
  const audioContext = new AudioContext();

  // Carga los archivos de audio en buffers
    //const audio_1 = 'https://manzdev.github.io/codevember2017/assets/eye-tiger.mp3';
    //const audio_2 = '{{ asset("storage/audios/Victoria.mp3") }}';

  const audioUrls = [audio_1, audio_2, audio_3, audio_4, audio_5];
  const audioBuffers = [];

  const loadAudio = async (url) => {
    const response = await fetch(url);
    const arrayBuffer = await response.arrayBuffer();
    const audioBuffer = await audioContext.decodeAudioData(arrayBuffer);
    return audioBuffer;
  };

  let buffers;
  Promise.all(audioUrls.map(url => loadAudio(url)))
    .then(loadedBuffers => {
      buffers = loadedBuffers;
    });

  // Agrega un controlador de eventos click al botón
  document.querySelector('#btnPlay').addEventListener('click', () => {
    buffers.forEach(buffer => {
      // Crea un nuevo nodo de fuente de buffer de audio
      const source = audioContext.createBufferSource();
      // Establece el buffer en el nodo de fuente de audio
      source.buffer = buffer;



      



        // Crea un nuevo nodo de paneo
        const panner = audioContext.createStereoPanner();
        // Establece el valor del paneo (de -1 a 1)
        //crea un numero con tres decimales, aleatorio entre -1 y 1
        const panIndex = Math.random() * (1 - (-1)) + (-1);
        //const index = Math.floor(Math.random() * 2);
        panner.pan.value = panIndex;

        // Conecta el nodo de fuente al nodo de paneo
        source.connect(panner);
        // Conecta el nodo de paneo al destino para que pueda ser reproducido
        //panner.connect(audioContext.destination);




        // Crea un nuevo nodo de ganancia
        const gainNode = audioContext.createGain();
        // Establece el valor de la ganancia (volumen)
        //crea un numero con tres decimales, aleatorio entre 0 y 1
        const gainIndex = Math.random() * (1 - 0) + 0;
        gainNode.gain.value = gainIndex;

        // Conecta el nodo de fuente al nodo de ganancia
        panner.connect(gainNode);
        // Conecta el nodo de ganancia al destino para que pueda ser reproducido
        gainNode.connect(audioContext.destination);




      // Conecta el nodo de fuente al destino para que pueda ser reproducido
      //source.connect(audioContext.destination);
      // Inicia la reproducción del audio
      source.start();
    });
  });


