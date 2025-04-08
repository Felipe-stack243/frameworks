import Image from "next/image";
import React from "react";
// import Saludo from "./Saludo";
import Componente from "./Componente";

export default function Home() {
    return (
        <div className="contenedor">
            {/* <Saludo nombre="Carmen"/>
            <Saludo nombre="Camila"/> */}
            <Componente/>
        </div>
    );
}
