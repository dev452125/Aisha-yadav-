<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification System</title>
    <style>
        :root {
            --aqua-primary: #00c6ff;
            --aqua-secondary: #0072ff;
            --aqua-light: #e0f7ff;
            --aqua-dark: #0066cc;
            --text-dark: #333;
            --white: #ffffff;
            --shadow: 0 10px 30px rgba(0, 114, 255, 0.2);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, var(--aqua-light) 0%, #b3e5fc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            animation: backgroundShift 15s ease infinite;
        }
        
        @keyframes backgroundShift {
            0% { background: linear-gradient(135deg, var(--aqua-light) 0%, #b3e5fc 100%); }
            50% { background: linear-gradient(135deg, #b3e5fc 0%, var(--aqua-light) 100%); }
            100% { background: linear-gradient(135deg, var(--aqua-light) 0%, #b3e5fc 100%); }
        }
        
        .container {
            width: 100%;
            max-width: 450px;
            animation: fadeIn 0.8s ease-out; margin-top: -2080px;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .logo h1 {
            color: var(--aqua-dark);
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .logo p {
            color: var(--aqua-secondary);
            font-size: 1rem;
            margin-top: 5px;
        }
        
        .form-container {
            background: var(--white);
            border-radius: 15px;
            padding: 40px 30px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--aqua-primary), var(--aqua-secondary));
            animation: progressBar 3s ease infinite;
        }
        
        @keyframes progressBar {
            0% { transform: translateX(-100%); }
            50% { transform: translateX(0); }
            100% { transform: translateX(100%); }
        }
        
        .form-container h2 {
            color: var(--aqua-dark);
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }
        
        .form-container h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, var(--aqua-primary), var(--aqua-secondary));
            border-radius: 3px;
        }
        
        .form-row {
            margin-bottom: 20px;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #f9f9f9;
        }
        
        input[type="text"]:focus {
            border-color: var(--aqua-primary);
            box-shadow: 0 0 0 3px rgba(0, 198, 255, 0.2);
            outline: none;
            background-color: var(--white);
        }
        
        .submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, var(--aqua-primary), var(--aqua-secondary));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 114, 255, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(0, 114, 255, 0.4);
        }
        
        .submit:active {
            transform: translateY(1px);
        }
        
        .submit::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .submit:hover::after {
            left: 100%;
        }
        
        .success-message {
            background: linear-gradient(135deg, #4cd964, #5ac8fa);
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            animation: successSlide 0.5s ease-out;
            box-shadow: 0 4px 10px rgba(76, 217, 100, 0.3);
        }
        
        @keyframes successSlide {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .error-message {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            animation: successSlide 0.5s ease-out;
            box-shadow: 0 4px 10px rgba(255, 107, 107, 0.3);
            border: 2px solid #ff4757;
        }
        
        .voucher-info {
            margin-top: 30px;
            text-align: center;
            padding: 15px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            animation: fadeIn 1s ease-out;
        }
        
        .voucher-info hr {
            border: none;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--aqua-primary), transparent);
            margin: 15px 0;
        }
        
        .footer {
            text-align: center;
            margin-top: 30px;
            color: var(--aqua-dark);
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        @media (max-width: 480px) {
            .form-container {
                padding: 30px 20px;
            }
            
            .logo h1 {
                font-size: 2rem;
            }
        }
        
        .bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            animation: float 15s infinite ease-in-out;
            z-index: -1;
        }
        
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); opacity: 0.5; }
            50% { transform: translateY(-20px) rotate(180deg); opacity: 0.8; }
            100% { transform: translateY(0) rotate(360deg); opacity: 0.5; }
        }
        
        .result-container {
            background: var(--white);
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--shadow);
            margin-top: 20px;
            animation: slideUp 0.6s ease-out;
        }
    </style>
</head>
<body>
    <!-- Background bubbles -->
    <div class="bubble" style="width: 80px; height: 80px; top: 10%; left: 10%; animation-delay: 0s;"></div>
    <div class="bubble" style="width: 120px; height: 120px; top: 70%; left: 80%; animation-delay: 2s;"></div>
    <div class="bubble" style="width: 60px; height: 60px; top: 40%; left: 20%; animation-delay: 4s;"></div>
    <div class="bubble" style="width: 100px; height: 100px; top: 20%; left: 70%; animation-delay: 6s;"></div>

    <div class="login-container">
       <div class="logo">