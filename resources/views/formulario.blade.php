<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Carro - XLCars</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #0a0a0a;
            color: #f0f0f0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-image: linear-gradient(rgba(10, 10, 10, 0.9), rgba(10, 10, 10, 0.9)), 
                              url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M50,5 L60,35 L90,35 L65,55 L75,85 L50,70 L25,85 L35,55 L10,35 L40,35 Z" fill="%23D4AF37" opacity="0.1"/></svg>');
        }
        
        .container {
            width: 100%;
            max-width: 900px;
            background-color: #111111;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.1);
            border: 1px solid #333;
        }
        
        .header {
            background-color: #000000;
            padding: 25px 30px;
            text-align: center;
            border-bottom: 3px solid #D4AF37;
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .logo-icon {
            color: #D4AF37;
            font-size: 32px;
            margin-right: 15px;
        }
        
        .logo-text {
            font-size: 32px;
            font-weight: 700;
            color: #D4AF37;
            letter-spacing: 2px;
        }
        
        .header h1 {
            font-size: 24px;
            font-weight: 300;
            color: #f0f0f0;
        }
        
        .form-container {
            padding: 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group.full-width {
            grid-column: 1 / 3;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #D4AF37;
            font-weight: 600;
            font-size: 15px;
        }
        
        .input-container {
            position: relative;
        }
        
        input, select {
            width: 100%;
            padding: 14px 15px;
            background-color: #1a1a1a;
            border: 1px solid #333;
            border-radius: 8px;
            color: #f0f0f0;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        input:focus, select:focus {
            outline: none;
            border-color: #D4AF37;
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.2);
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #D4AF37;
        }
        
        .buttons {
            grid-column: 1 / 3;
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        
        button {
            padding: 15px 40px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-submit {
            background-color: #D4AF37;
            color: #000;
        }
        
        .btn-submit:hover {
            background-color: #c19b2e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }
        
        .btn-reset {
            background-color: #222;
            color: #D4AF37;
            border: 1px solid #333;
        }
        
        .btn-reset:hover {
            background-color: #2a2a2a;
            transform: translateY(-2px);
        }
        
        .btn-icon {
            margin-right: 10px;
            font-size: 18px;
        }
        
        .car-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #D4AF37;
            font-size: 40px;
            opacity: 0.3;
        }
        
        @media (max-width: 768px) {
            .form-container {
                grid-template-columns: 1fr;
            }
            
            .form-group.full-width {
                grid-column: 1;
            }
            
            .buttons {
                grid-column: 1;
                flex-direction: column;
            }
            
            .car-icon {
                display: none;
            }
        }
        
        .required::after {
            content: " *";
            color: #ff4444;
        }
        
        .success-message {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #1a3c1a;
            color: #4CAF50;
            padding: 15px 25px;
            border-radius: 8px;
            border-left: 4px solid #4CAF50;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            z-index: 1000;
            animation: slideIn 0.5s ease;
        }
        
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <i class="fas fa-crown logo-icon"></i>
                <div class="logo-text">XLCARS</div>
            </div>
            <h1>Cadastro de Veículo</h1>
        </div>
        
        <div class="form-container">
            <i class="fas fa-car car-icon"></i>
            
            <div class="form-group">
                <label for="modelo" class="required">Modelo</label>
                <div class="input-container">
                    <input type="text" id="modelo" placeholder="Ex: Ferrari F8 Tributo">
                    <i class="fas fa-car input-icon"></i>
                </div>
            </div>
            
            <div class="form-group">
                <label for="dono" class="required">Proprietário</label>
                <div class="input-container">
                    <input type="text" id="dono" placeholder="Nome do proprietário">
                    <i class="fas fa-user input-icon"></i>
                </div>
            </div>
            
            <div class="form-group">
                <label for="email" class="required">E-mail</label>
                <div class="input-container">
                    <input type="email" id="email" placeholder="exemplo@email.com">
                    <i class="fas fa-envelope input-icon"></i>
                </div>
            </div>
            
            <div class="form-group">
                <label for="placa" class="required">Placa</label>
                <div class="input-container">
                    <input type="text" id="placa" placeholder="AAA-0000">
                    <i class="fas fa-id-card input-icon"></i>
                </div>
            </div>
            
            <div class="form-group">
                <label for="cor" class="required">Cor</label>
                <div class="input-container">
                    <input type="text" id="cor" placeholder="Ex: Vermelho">
                    <i class="fas fa-palette input-icon"></i>
                </div>
            </div>
            
            <div class="form-group">
                <label for="valor" class="required">Valor (R$)</label>
                <div class="input-container">
                    <input type="number" id="valor" placeholder="0,00" min="0" step="0.01">
                    <i class="fas fa-dollar-sign input-icon"></i>
                </div>
            </div>
            
            <div class="form-group">
                <label for="potencia" class="required">Potência (cv)</label>
                <div class="input-container">
                    <input type="number" id="potencia" placeholder="Ex: 300">
                    <i class="fas fa-bolt input-icon"></i>
                </div>
            </div>
            
            <div class="form-group">
                <label for="tipo_gasolina" class="required">Tipo de Combustível</label>
                <div class="input-container">
                    <select id="tipo_gasolina">
                        <option value="">Selecione...</option>
                        <option value="gasolina">Gasolina</option>
                        <option value="etanol">Etanol</option>
                        <option value="flex">Flex (Gasolina/Etanol)</option>
                        <option value="diesel">Diesel</option>
                        <option value="eletrico">Elétrico</option>
                        <option value="hibrido">Híbrido</option>
                    </select>
                    <i class="fas fa-gas-pump input-icon"></i>
                </div>
            </div>
            
            <div class="form-group full-width">
                <label for="observacoes">Observações Adicionais</label>
                <div class="input-container">
                    <input type="text" id="observacoes" placeholder="Informações adicionais sobre o veículo">
                    <i class="fas fa-sticky-note input-icon"></i>
                </div>
            </div>
            
            <div class="buttons">
                <button type="button" class="btn-submit" id="btnSubmit">
                    <i class="fas fa-save btn-icon"></i> Cadastrar Veículo
                </button>
                <button type="button" class="btn-reset" id="btnReset">
                    <i class="fas fa-redo btn-icon"></i> Limpar Formulário
                </button>
            </div>
        </div>
    </div>
    
    <div class="success-message" id="successMessage">
        <i class="fas fa-check-circle"></i> Veículo cadastrado com sucesso!
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('.form-container');
            const btnSubmit = document.getElementById('btnSubmit');
            const btnReset = document.getElementById('btnReset');
            const successMessage = document.getElementById('successMessage');
            const inputs = document.querySelectorAll('input, select');
            
            // Função para formatar a placa
            const placaInput = document.getElementById('placa');
            placaInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
                
                if (value.length > 3) {
                    value = value.substring(0, 3) + '-' + value.substring(3, 7);
                }
                
                e.target.value = value;
            });
            
            // Função para formatar o valor
            const valorInput = document.getElementById('valor');
            valorInput.addEventListener('blur', function(e) {
                if (e.target.value) {
                    let valor = parseFloat(e.target.value);
                    e.target.value = valor.toLocaleString('pt-BR', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                }
            });
            
            // Função para verificar se todos os campos obrigatórios estão preenchidos
            function validateForm() {
                let isValid = true;
                const requiredInputs = document.querySelectorAll('input[required], select[required]');
                
                requiredInputs.forEach(input => {
                    input.style.borderColor = '#333';
                    
                    if (!input.value.trim()) {
                        input.style.borderColor = '#ff4444';
                        isValid = false;
                    }
                });
                
                return isValid;
            }
            
            // Função para exibir mensagem de sucesso
            function showSuccessMessage() {
                successMessage.style.display = 'block';
                
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 4000);
            }
            
            // Evento de submit do formulário
            btnSubmit.addEventListener('click', function() {
                if (validateForm()) {
                    // Aqui normalmente enviaria os dados para um servidor
                    console.log('Dados do veículo:');
                    console.log('Modelo:', document.getElementById('modelo').value);
                    console.log('Proprietário:', document.getElementById('dono').value);
                    console.log('E-mail:', document.getElementById('email').value);
                    console.log('Placa:', document.getElementById('placa').value);
                    console.log('Cor:', document.getElementById('cor').value);
                    console.log('Valor:', document.getElementById('valor').value);
                    console.log('Potência:', document.getElementById('potencia').value);
                    console.log('Combustível:', document.getElementById('tipo_gasolina').value);
                    
                    showSuccessMessage();
                    
                    // Não limpar o formulário automaticamente
                    // para permitir que o usuário veja os dados cadastrados
                } else {
                    alert('Por favor, preencha todos os campos obrigatórios marcados com *.');
                }
            });
            
            // Evento para limpar o formulário
            btnReset.addEventListener('click', function() {
                if (confirm('Tem certeza que deseja limpar todos os campos?')) {
                    inputs.forEach(input => {
                        input.value = '';
                        input.style.borderColor = '#333';
                    });
                }
            });
            
            // Adiciona validação em tempo real para campos obrigatórios
            inputs.forEach(input => {
                if (input.hasAttribute('required')) {
                    input.addEventListener('blur', function() {
                        if (!this.value.trim()) {
                            this.style.borderColor = '#ff4444';
                        } else {
                            this.style.borderColor = '#333';
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
php