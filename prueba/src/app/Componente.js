"use client";
import React, { useState } from "react";

function Componente() {
    const [num1, setNum1] = useState("");
    const [num2, setNum2] = useState("");
    const [result, setResult] = useState(null);


    const calcularSuma = () => {
        const sum = parseFloat(num1) + parseFloat(num2);
        setResult(`Resultado: ${sum}`);
    };

    const calcularResta = () => {
        const rest = parseFloat(num1) - parseFloat(num2);
        setResult(`Resultado: ${rest}`);
    };

    const calcularMultiplicacion = () => {
        const mult = parseFloat(num1) * parseFloat(num2);
        setResult(`Resultado: ${mult}`);
    };

    const calcularDivision = () => {
        if (parseFloat(num2) === 0) {
            setResult("No se puede dividir entre 0.");
        }
        else {
            const div = parseFloat(num1) / parseFloat(num2);
            setResult(`Resultado: ${div}`);
        }
    };

    return (
        <div className="carta">
            <h2 className="carta__titulo">Calculadora</h2>

            <div className="carta__inputs">
                <div className="carta__input carta__input--100">
                    <div className="carta__campo">
                        <input type="number" className="input" id="txtNum1" value={num1} onChange={(e) => setNum1(e.target.value)} placeholder=" "/>
                        <label for="txtNum1" class="carta__label">Numero 1</label>
                    </div>
                </div>
                <div className="carta__input carta__input--100">
                    <div className="carta__campo">
                        <input type="number" className="input" id="txtNum2" value={num2} onChange={(e) => setNum2(e.target.value)} placeholder=" "/>
                        <label for="txtNum2" class="carta__label">Numero 2</label>
                    </div>
                </div>
            </div>

            <div className="contenedor-botones">
                <button className="boton izquierda" onClick={calcularSuma}>Sumar</button>
                <button className="boton medio" onClick={calcularResta}>Restar</button>
                <button className="boton medio" onClick={calcularMultiplicacion}>Multiplicar</button>
                <button className="boton derecha" onClick={calcularDivision}>Dividir</button>
            </div>
            
            <div className="resultado">
                {result !== null && <h3>{result}</h3>}
            </div>
        </div>
    );
}

export default Componente;