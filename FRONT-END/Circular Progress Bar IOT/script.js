let progressBarTensao = document.querySelector(".circular-progress-tensao");
let valueContainerTensao = document.querySelector(".value-container-tensao");

let progressBarVento = document.querySelector(".circular-progress-vento");
let valueContainerVento = document.querySelector(".value-container-vento");

let progressBarYaw = document.querySelector(".circular-progress-yaw");
let valueContainerYaw = document.querySelector(".value-container-yaw");

let progressBarPitch = document.querySelector(".circular-progress-pitch");
let valueContainerPitch = document.querySelector(".value-container-pitch");

let progressBarRpm = document.querySelector(".circular-progress-rpm");
let valueContainerRpm = document.querySelector(".value-container-rpm");

/*=========================================================*/

let progressValueTensao = 0;
let progressEndValueTensao = 100;
let speedTensao = 5;


let progressTensao = setInterval(() => {
  progressValueTensao++;
  valueContainerTensao.textContent = `${progressValueTensao}%`;
  progressBarTensao.style.background = `conic-gradient(
      #4d5bf9 ${progressValueTensao * 3.6}deg,
      #cadcff ${progressValueTensao * 3.6}deg
  )`;
  if (progressValueTensao == progressEndValueTensao) {
    clearInterval(progressTensao);
  }
}, speedTensao);

/*=========================================================*/

let progressValueVento = 0;
let progressEndValueVento = 80;
let speedVento = 5;


let progressVento = setInterval(() => {
  progressValueVento++;
  valueContainerVento.textContent = `${progressValueVento}%`;
  progressBarVento.style.background = `conic-gradient(
      #4d5bf9 ${progressValueVento * 3.6}deg,
      #cadcff ${progressValueVento * 3.6}deg
  )`;
  if (progressValueVento == progressEndValueVento) {
    clearInterval(progressVento);
  }
}, speedVento);

/*=========================================================*/

let progressValueYaw = 0;
let progressEndValueYaw = 60;
let speedYaw = 5;


let progressYaw = setInterval(() => {
  progressValueYaw++;
  valueContainerYaw.textContent = `${progressValueYaw}%`;
  progressBarYaw.style.background = `conic-gradient(
      #4d5bf9 ${progressValueYaw * 3.6}deg,
      #cadcff ${progressValueYaw * 3.6}deg
  )`;
  if (progressValueYaw == progressEndValueYaw) {
    clearInterval(progressYaw);
  }
}, speedYaw);

/*=========================================================*/

let progressValuePitch = 0;
let progressEndValuePitch = 40;
let speedPitch = 5;


let progressPitch = setInterval(() => {
  progressValuePitch++;
  valueContainerPitch.textContent = `${progressValuePitch}%`;
  progressBarPitch.style.background = `conic-gradient(
      #4d5bf9 ${progressValuePitch * 3.6}deg,
      #cadcff ${progressValuePitch * 3.6}deg
  )`;
  if (progressValuePitch == progressEndValuePitch) {
    clearInterval(progressPitch);
  }
}, speedPitch);

/*=========================================================*/

let progressValueRpm = 0;
let progressEndValueRpm = 20;
let speedRpm = 5;


let progressRpm = setInterval(() => {
  progressValueRpm++;
  valueContainerRpm.textContent = `${progressValueRpm}%`;
  progressBarRpm.style.background = `conic-gradient(
      #4d5bf9 ${progressValueRpm * 3.6}deg,
      #cadcff ${progressValueRpm * 3.6}deg
  )`;
  if (progressValueRpm == progressEndValueRpm) {
    clearInterval(progressRpm);
  }
}, speedRpm);