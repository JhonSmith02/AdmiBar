import {src, dest, watch} from 'gulp';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass'; //Extrae las dependencias de gulp-sass para hacerlas utilizables aqui en el archivo gulpfile

const sass = gulpSass(dartSass);

export function css ( done ){
    src('src/scss/app.scss') //busca el archivo que debe compilar
        .pipe( sass() ) //Aplicamos sass a el archivo encontrado previamente
        .pipe( dest('build/css') ); //Crea una carpeta llamada build y dentro de esta css y ahi se encuentra nuestro codigo compilado

    done(); //Le indica a la funcion que su tarea a finalizado.
}

export function dev(){

    watch('src/scss/**/*.scss', css);

}
