"use strict"


const API_URL = "api/comentarios/zapatilla/";
const BorrarComentario = "api/comentarios/";

let coments = [];

async function getComentarios() {
    let puntaje = document.querySelectorAll(".puntaje");
    for (let valor of puntaje) {
        valor.addEventListener("click", obtenerValor);
    }
    let id_zapatilla = document.getElementById("id_zapatilla").value;

    try {
        let response = await fetch(API_URL + id_zapatilla);

        if (response.ok) {
            let comentarios = await response.json();
            app.comentarios = comentarios;
            console.log(comentarios);
            app.promedioPuntaje = 0;
            for (const puntaje of comentarios) {
                app.promedioPuntaje += parseInt(puntaje.puntaje);
            }
            if (comentarios.length === 0) {
                app.promedioPuntaje = 0;
            }
            else {
                app.promedioPuntaje = (app.promedioPuntaje / comentarios.length);
            }
        }
    }
    catch (e) {
        console.log(e);
    }
}


function obtenerValor() {
    estrellas = event.currentTarget.value;
}

async function insertComment() {
    let form = document.getElementById("formComentario");
    let id_zapatilla =  form.dataset.id;
    let comentario = document.getElementById("comentario").value;

    if (comentario != "" && estrellas > 0) {
        let comentarioNuevo = {
            "id_zapatilla": id_zapatilla,
            "comentario": comentario,
            "puntuacion": estrellas,
        }
        try {
            let response = await fetch(API_URL + id_zapatilla, {
                "method": "POST",
                "headers": { "Content-type": "application/json" },
                "body": JSON.stringify(comentarioNuevo)

            });
            if (response.ok) {
                console.log("Comentario añadido con exito");
            }
        }
        catch (e) {
            console.log(e);
        }
        getComentarios();
    }
}

async function getComentariosByOrder() {
    let id_zapatilla = document.getElementById("id_zapatilla").value;
    let orden = document.getElementById("order").value;
    console.log("ORDEN: " + orden);
    console.log("ID zapatilla: " + id_zapatilla);

    try {
        let response = await fetch(API_URL + id_zapatilla + '/' + orden);

        if (response.ok) {
            let comentarios = await response.json();
            app.comentarios = comentarios;
            console.log(comentarios);
            app.promedioPuntaje = 0;
            for (const puntaje of comentarios) {
                app.promedioPuntaje += parseInt(puntaje.puntaje) / comentarios.length;
            }
            console.log("PROMEDIO PUNAJE: " + app.promedioPuntaje);
        }
        else {
            console.log("No hay comentarios en esta zapatilla");
            app.error = "❌No hay comentarios en esta zapatilla para ordenar❌";
            setTimeout(error, 3000);
        }
    }
    catch (e) {
        console.log(e);
    }
}

function error() {
    app.error = "";
}


async function getComentariosByStars() {
    let id_zapatilla = document.getElementById("id_zapatilla").value;
    let puntaje = document.getElementById("puntaje").value;
    console.log("PUNTAJE: " + puntaje);
    console.log("ID zapatilla: " + id_zapatilla);

    try {
        let response = await fetch('api/coments/zapatilla/' + id_zapatilla + '/' + puntaje);
        if (response.ok) {
            let comentarios = await response.json();
            app.comentarios = comentarios;

        }
        else {
            console.log("No hay comentarios con ese puntaje");
            app.error = "❌No hay comentarios con ese puntaje❌";
            setTimeout(error, 3000);
        }
    }
    catch (e) {
        console.log(e);
    }
}


