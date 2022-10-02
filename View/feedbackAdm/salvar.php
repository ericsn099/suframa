<?php if (isset($_GET['message'])) echo (printMessage($_GET['message']));
function printMessage($message)
{
    if ($message == 'success-create')
        return "<div class='modal'>
                    <div class='modal-area'>
                        <div class='modal-info'>
                            <div class='texto-agente'>
                            SALVO COM SUCESSO
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    let abrirModal = () => document.querySelector('.modal').style.display = 'flex';
                    let fecharModal = () => document.querySelector('.modal').style.display = 'none';
                    setTimeout(() => {
                    abrirModal();
                    clearTimeout();
                    }, 0)

                    setTimeout(() => {
                    fecharModal();
                    window.location.replace('/adm');
                    }, 1000)
                </script>
                ";
    if ($message == 'error-create')
        return "<div class='modal'>
                    <div class='modal-area' style='background-color: #9d3535'>
                        <div class='modal-info'>
                            <div class='texto-agente'>
                                ERRO AO SALVAR
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    let abrirModal = () => document.querySelector('.modal').style.display = 'flex';
                    let fecharModal = () => document.querySelector('.modal').style.display = 'none';
                    setTimeout(() => {
                    abrirModal();
                    clearTimeout();
                    }, 0)

                    setTimeout(() => {
                    fecharModal();
                    window.location.replace('/adm');
                    }, 2000)
                </script>
                ";
    if ($message == 'success-delete')
        return "<div class='modal'>
                            <div class='modal-area'>
                                <div class='modal-info'>
                                    <div class='texto-agente'>
                                        EXCLUIDO COM SUCESSO
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            let abrirModal = () => document.querySelector('.modal').style.display = 'flex';
                            let fecharModal = () => document.querySelector('.modal').style.display = 'none';
                            setTimeout(() => {
                            abrirModal();
                            clearTimeout();
                            }, 0)
        
                            setTimeout(() => {
                            fecharModal();
                            window.location.replace('/adm');
                            }, 2000)
                        </script>
                        ";
    if ($message == 'error-delete')
        return "<div class='modal'>
                    <div class='modal-area' style='background-color: #9d3535'>
                        <div class='modal-info'>
                            <div class='texto-agente'>
                                ERRO AO EXCLUIR
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    let abrirModal = () => document.querySelector('.modal').style.display = 'flex';
                    let fecharModal = () => document.querySelector('.modal').style.display = 'none';
                    setTimeout(() => {
                    abrirModal();
                    clearTimeout();
                    }, 0)

                    setTimeout(() => {
                    fecharModal();
                    window.location.replace('/adm');
                    }, 2000)
                </script>
                ";
}
