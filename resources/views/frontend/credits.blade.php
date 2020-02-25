@extends('layouts.frontend')
<style>

    body {
        background-color: white !important;
    }

    .content-center {
        display: -webkit-box;display: -moz-box;display: -ms-flexbox;display: -webkit-flex;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .content-whois {
        width: 100%;
        height: 200px;
        border: 1px solid red;
    }

    .content-collaborator {
        width: 100%;
        padding: 2em;
        border: 1px solid red;
    }

    #content-main {
        width: 80%;
    }
    .container-card {
        padding: 1em;
        border: 1px solid red;
        float: left;
        width: 50%;
    }

    .contentCard {
        padding: 10px 2em 10px 2em;
        border-radius: 100px;
        border: 1px solid black;
        /* box-shadow: 3px 3px grey; */
        color: black;
    }

    #whois {
        width: 80%;
    }
    .collaborator {
        height: 100px;
    }

    .internal-content {
        width: 100%;
        height: 100%;
    }

    .selfie-container {
        width: 80px;
        height: 100%;
        border: 1px solid black;
        float: left;
        border-radius: 40px;
    }

    .infoCard {
        float: left;
        height: 100%;
        padding-left: 10px;
    }

    .content-name {
        position: relative;
        top: 20px;
    }

    .content-links {
        position: relative;
        top: 30px;
    }

    .content-name, .content-links {
        width: 100%;
    }

    svg {
        width: 25px;
        height: 25px;
    }

</style>
@section('content')
<div class="content-whois content-center">
    <div id="whois" class="contentCard">
        <h3>¿Qué es CeliaTour?</h3>
        <p>
            Es una aplicación web para la creación de recorridos virtuales a partir de fotografías
            360 desarrollada por el alumnado de 2º curso del Ciclo Formativo de Desarrollo 
            de Aplicaciones Web en IES Celia Viñas de Almería (España) durante el curso 2017/2018.
        </p>
    </div>
</div>
<div class="content-collaborator content-center">

    <div id="content-main">
            
        <div class="container-card">
            <div class="contentCard collaborator">
                <div class="internal-content">
                    <div class="selfie-container" style="background: url('{{ url('/img/credits/4.png') }}'); background-size: cover;">
                    </div>
                    <div class="infoCard">
                        <div class="content-name">Alejandro clares muñoz</div>
                        <div class="content-links">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 -60 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <path d="M10.688,95.156C80.958,154.667,204.26,259.365,240.5,292.01c4.865,4.406,10.083,6.646,15.5,6.646
                                            c5.406,0,10.615-2.219,15.469-6.604c36.271-32.677,159.573-137.385,229.844-196.896c4.375-3.698,5.042-10.198,1.5-14.719
                                            C494.625,69.99,482.417,64,469.333,64H42.667c-13.083,0-25.292,5.99-33.479,16.438C5.646,84.958,6.313,91.458,10.688,95.156z"/>
                                        <path d="M505.813,127.406c-3.781-1.76-8.229-1.146-11.375,1.542c-46.021,39.01-106.656,90.552-152.385,129.885
                                            c-2.406,2.063-3.76,5.094-3.708,8.271c0.052,3.167,1.521,6.156,4,8.135c42.49,34.031,106.521,80.844,152.76,114.115
                                            c1.844,1.333,4.031,2.01,6.229,2.01c1.667,0,3.333-0.385,4.865-1.177c3.563-1.823,5.802-5.49,5.802-9.49V137.083
                                            C512,132.927,509.583,129.146,505.813,127.406z"/>
                                        <path d="M16.896,389.354c46.25-33.271,110.292-80.083,152.771-114.115c2.479-1.979,3.948-4.969,4-8.135
                                            c0.052-3.177-1.302-6.208-3.708-8.271C124.229,219.5,63.583,167.958,17.563,128.948c-3.167-2.688-7.625-3.281-11.375-1.542
                                            C2.417,129.146,0,132.927,0,137.083v243.615c0,4,2.24,7.667,5.802,9.49c1.531,0.792,3.198,1.177,4.865,1.177
                                            C12.865,391.365,15.052,390.688,16.896,389.354z"/>
                                        <path d="M498.927,418.375c-44.656-31.948-126.917-91.51-176.021-131.365c-4-3.26-9.792-3.156-13.729,0.24
                                            c-9.635,8.406-17.698,15.49-23.417,20.635c-17.563,15.854-41.938,15.854-59.542-0.021c-5.698-5.135-13.76-12.24-23.396-20.615
                                            c-3.906-3.417-9.708-3.521-13.719-0.24c-48.938,39.719-131.292,99.354-176.021,131.365c-2.49,1.792-4.094,4.552-4.406,7.604
                                            c-0.302,3.052,0.708,6.083,2.802,8.333C19.552,443.01,30.927,448,42.667,448h426.667c11.74,0,23.104-4.99,31.198-13.688
                                            c2.083-2.24,3.104-5.271,2.802-8.323C503.021,422.938,501.417,420.167,498.927,418.375z"/>
                            </svg>
                            <svg id="Bold" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg">
                                <path d="m23.994 24v-.001h.006v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07v-2.185h-4.773v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243v7.801z"/>
                                <path d="m.396 7.977h4.976v16.023h-4.976z"/>
                                <path d="m2.882 0c-1.591 0-2.882 1.291-2.882 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909c-.001-1.591-1.292-2.882-2.882-2.882z"/>
                            </svg>
                            <svg enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg">
                                <path d="m12 .5c-6.63 0-12 5.28-12 11.792 0 5.211 3.438 9.63 8.205 11.188.6.111.82-.254.82-.567 0-.28-.01-1.022-.015-2.005-3.338.711-4.042-1.582-4.042-1.582-.546-1.361-1.335-1.725-1.335-1.725-1.087-.731.084-.716.084-.716 1.205.082 1.838 1.215 1.838 1.215 1.07 1.803 2.809 1.282 3.495.981.108-.763.417-1.282.76-1.577-2.665-.295-5.466-1.309-5.466-5.827 0-1.287.465-2.339 1.235-3.164-.135-.298-.54-1.497.105-3.121 0 0 1.005-.316 3.3 1.209.96-.262 1.98-.392 3-.398 1.02.006 2.04.136 3 .398 2.28-1.525 3.285-1.209 3.285-1.209.645 1.624.24 2.823.12 3.121.765.825 1.23 1.877 1.23 3.164 0 4.53-2.805 5.527-5.475 5.817.42.354.81 1.077.81 2.182 0 1.578-.015 2.846-.015 3.229 0 .309.21.678.825.56 4.801-1.548 8.236-5.97 8.236-11.173 0-6.512-5.373-11.792-12-11.792z" fill="#212121"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection