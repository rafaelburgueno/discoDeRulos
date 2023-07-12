console.log("***** discoderulos-core.js *****");

// **************************************
// Web Audio API
// **************************************

// Crea un nuevo AudioContext
const audioContext = new AudioContext();

// Crea dos nuevos AudioBufferSourceNodes
const source1 = audioContext.createBufferSource();
const source2 = audioContext.createBufferSource();
const source3 = audioContext.createBufferSource();
const source4 = audioContext.createBufferSource();
const source5 = audioContext.createBufferSource();
const source6 = audioContext.createBufferSource();

// Crea cinco nuevos GainNodes
const gainNode1 = audioContext.createGain();
const gainNode2 = audioContext.createGain();
const gainNode3 = audioContext.createGain();
const gainNode4 = audioContext.createGain();
const gainNode5 = audioContext.createGain();
const gainNode6 = audioContext.createGain();



// Crea dos nuevos StereoPannerNodes
const panner1 = audioContext.createStereoPanner();
const panner2 = audioContext.createStereoPanner();
const panner3 = audioContext.createStereoPanner();
const panner4 = audioContext.createStereoPanner();
const panner5 = audioContext.createStereoPanner();
const panner6 = audioContext.createStereoPanner();

// crea un nuevo BiquadFilterNode
const biquadFilter4 = audioContext.createBiquadFilter();





// *****************
// VOLUMEN 
// *****************
// Establece el valor de la ganancia para cada GainNode con un numero random entre 0.5 y 1.0 con dos decimales
gainNode1.gain.value = Math.random() * (1 - 0.5) + 0.3; //
gainNode2.gain.value = Math.random() * (1 - 0.5) + 0.3; //
gainNode3.gain.value = Math.random() * (1 - 0.5) + 0.3; //
gainNode4.gain.value = Math.random() * (1 - 0.5) + 0.3; //
gainNode5.gain.value = Math.random() * (1 - 0.5) + 0.3; //
gainNode6.gain.value = Math.random() * (1 - 0.5) + 0.3; //

console.log("gainNode3.gain.value: " + gainNode3.gain.value);

// *****************
// PANEO 
// *****************
// Establece el valor del paneo para cada StereoPannerNode con un numero random entre -1 y 1 con dos decimales
panner1.pan.value = Math.random() * (1 - -1) + -1; //
panner2.pan.value = Math.random() * (1 - -1) + -1; // 
panner3.pan.value = Math.random() * (1 - -1) + -1; // 
panner4.pan.value = Math.random() * (1 - -1) + -1; // 
panner5.pan.value = Math.random() * (1 - -1) + -1; 
panner6.pan.value = Math.random() * (1 - -1) + -1;


console.log("panner3.pan.value: " + panner3.pan.value);


// *****************
// FILTRO
// *****************
// Establece el tipo de filtro
biquadFilter4.type = "bandpass";
// Establece la frecuencia de corte
biquadFilter4.frequency.value = 432;
// Establece el Q
biquadFilter4.Q.value = 20;
// Establece la ganancia
biquadFilter4.gain.value = 30;


// *****************
// ANALYZER
// *****************
// Crea un nuevo AnalyserNode
const analyser = audioContext.createAnalyser();










// Obtén los archivos de audio y decodifica sus datos
async function getData() {
	try{
		const response1 = await fetch(audio_1);
		const response2 = await fetch(audio_2);
		const response3 = await fetch(audio_3);
		const response4 = await fetch(audio_4);
		const response5 = await fetch(audio_5);
		const response6 = await fetch(audio_6);

		const arrayBuffer1 = await response1.arrayBuffer();
		const arrayBuffer2 = await response2.arrayBuffer();
		const arrayBuffer3 = await response3.arrayBuffer();
		const arrayBuffer4 = await response4.arrayBuffer();
		const arrayBuffer5 = await response5.arrayBuffer();
		const arrayBuffer6 = await response6.arrayBuffer();

		source1.buffer = await audioContext.decodeAudioData(arrayBuffer1);
		source2.buffer = await audioContext.decodeAudioData(arrayBuffer2);
		source3.buffer = await audioContext.decodeAudioData(arrayBuffer3);
		source4.buffer = await audioContext.decodeAudioData(arrayBuffer4);
		source5.buffer = await audioContext.decodeAudioData(arrayBuffer5);
		source6.buffer = await audioContext.decodeAudioData(arrayBuffer6);
	} catch (error) {
		// Si ocurre un error, muestra un mensaje de error en la consola
		console.error('Error al obtener o decodificar los datos del archivo de audio:', error);
	}
}




// **************************************
// Conecta los nodos
// **************************************

// Conecta las fuentes a los StereoPannerNodes y los StereoPannerNodes al destino (altavoces)
source1.connect(gainNode1).connect(panner1).connect(analyser);
source2.connect(gainNode2).connect(panner2).connect(analyser);
source3.connect(gainNode3).connect(panner3).connect(analyser);
source4.connect(gainNode4).connect(panner4).connect(biquadFilter4).connect(analyser);
source5.connect(gainNode5).connect(panner5).connect(analyser);
source6.connect(gainNode6).connect(panner6).connect(analyser);

// Conecta el AnalyserNode al destino (altavoces)
analyser.connect(audioContext.destination);
// Crea un array para almacenar los datos de la forma de onda
const timeDomainData = new Uint8Array(analyser.fftSize);




// Crea una función para realizar un barrido de paneo
function barridoDePaneo() {
	// Establece el valor inicial del paneo
	//let panValue = -1;
	//panner3.pan.value = panValue;
	let panValue = panner3.pan.value;
  
	// Establece la dirección inicial del barrido (1 = derecha, -1 = izquierda)
	let direction = 1;
  
	// Crea un intervalo para actualizar el valor del paneo cada un segundo
	const interval = setInterval(() => {
	  // Incrementa o disminuye el valor del paneo en 0.05 dependiendo de la dirección del barrido
	  panValue += 0.03 * direction;
	  panner3.pan.value = panValue;
  
	  // Si el valor del paneo llega a 1 o -1, cambia la dirección del barrido
	  if (panValue >= 0.95 || panValue <= -0.95) {
		direction *= -1;
		console.log('¡Ping Pan!', panValue);
		console.log('Time:', audioContext.currentTime);
	  }
	  //draw();
	}, 1000);
  }





// Función para realizar un barrido en la frecuencia de corte del filtro
function barridoDeFiltro() {
	// Establece el valor inicial de la frecuencia de corte
	let frequencyValue = 1000;
	biquadFilter4.frequency.value = frequencyValue;

	// Establece la dirección inicial del barrido (1 = derecha, -1 = izquierda)
	let direction = 1;
	
	// Crea un intervalo para actualizar el valor de la frecuencia de corte cada un segundo
	const interval = setInterval(() => {
		// Incrementa o disminuye el valor de la frecuencia de corte en 100 dependiendo de la dirección del barrido
		frequencyValue += 100 * direction;
		biquadFilter4.frequency.value = frequencyValue;

		// Si el valor de la frecuencia de corte llega a 10000 o 100, cambia la dirección del barrido
		if (frequencyValue >= 5000 || frequencyValue <= 50) {
			direction *= -1;
			console.log('¡Ping Filtro!', frequencyValue);
			console.log('Time:', audioContext.currentTime);
		}
	}, 1000);
}




// ******************
// VISUALIZADOR
// ******************
// Crea un nuevo canvas
const canvas = document.querySelector('canvas');
const canvasCtx = canvas.getContext('2d');
canvas.width = 500;
canvas.height = 100;

function draw() {
  // Obtén los datos de la forma de onda del sonido en tiempo real
  analyser.getByteTimeDomainData(timeDomainData);

  // Dibuja la forma de onda en el canvas
  canvasCtx.fillStyle = 'rgb(31, 38, 31)';
  canvasCtx.fillRect(0, 0, canvas.width, canvas.height);
  canvasCtx.lineWidth = 1;
  canvasCtx.strokeStyle = 'rgb(146, 255, 213)';
  canvasCtx.beginPath();
  const sliceWidth = canvas.width * 1.0 / analyser.fftSize;
  let x = 0;
  for (let i = 0; i < analyser.fftSize; i++) {
    const v = timeDomainData[i] / 128.0;
    const y = v * canvas.height / 2;
    if (i === 0) {
      canvasCtx.moveTo(x, y);
    } else {
      canvasCtx.lineTo(x, y);
    }
    x += sliceWidth;
  }
  canvasCtx.lineTo(canvas.width, canvas.height / 2);
  canvasCtx.stroke();

  //console.log("draw", analyser.fftSize);
}

// Llama a la función draw cada vez que se actualiza la pantalla
requestAnimationFrame(draw);
	









// **************************************
// EVENTOS
// **************************************


// PLAY
// Agrega un controlador de eventos al botón para iniciar la reproducción
const playButton = document.querySelector('#btnPlay');
playButton.addEventListener('click', () => {
	barridoDePaneo();
	barridoDeFiltro()
	getData().then(() => {
		source1.start();
		source2.start();
		source3.start();
		source4.start();
		source5.start();
		source6.start();
	});

	// Llama a la función draw para dibiujar la forma de onda en el canvas
	setInterval(() => {
		draw();
	}, 30);	

});


// STOP
// Agrega un controlador de eventos al botón para detener la reproducción
const stopButton = document.querySelector('#btnStop');
stopButton.addEventListener('click', () => {
  source1.stop();
  source2.stop();
  source3.stop();
  source4.stop();
  source5.stop();
  source6.stop();
  
});
