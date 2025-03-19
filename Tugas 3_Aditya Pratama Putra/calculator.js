const readline = require("readline");

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});

const kalkulator = (operator, ...angka) => {
  if (operator === "+") {
    return angka.reduce((a, b) => a + b);
  } else if (operator === "-") {
    return angka.reduce((a, b) => a - b);
  } else if (operator === "*") {
    return angka.reduce((a, b) => a * b);
  } else if (operator === "/") {
    return angka.reduce((a, b) => a / b);
  } else if (operator === "%") {
    return angka.reduce((a, b) => a % b);
  } else {
    return "Operator tidak valid!";
  }
};

rl.question(
  "Masukkan operasi yang ingin dilakukan (+, -, *, /, %): ",
  (operator) => {
    rl.question("Masukkan angka (pisahkan dengan spasi): ", (inputAngka) => {
      const angka = inputAngka.split(" ").map(Number);
      const hasil = kalkulator(operator, ...angka);
      console.log(`Hasil: ${hasil}`);
      rl.close();
    });
  }
);
