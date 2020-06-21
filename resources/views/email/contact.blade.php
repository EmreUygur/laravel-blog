<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div style="text-align: center; width: 100%; background-color: #4a5568; color: #f8f8f8; margin-bottom: 25px;">
            <h2 style="padding: 16px 0;">Contact Form</h2>
        </div>

        <div style=" margin: 0 16px; color: #4a5568">
            <div style="margin-bottom: 16px; font-weight: bold;">
                Sender: {{ $name." <".$email.">" }}
            </div>

            <div style="border: 2px #4a5568 solid; color: #4a5568; border-radius: 15px 35px 15px; padding: 16px;">
                {{ $body }}
            </div>
        </div>

        <div style="text-align: center; width: 100%; background-color: #4a5568; color: #f8f8f8; margin-top: 25px;">
            <h5 style="padding: 12px 0;">© {{ date('Y') }} Emre UYGUR. All Rights Reserved</h3>
        </div>
    </body>
</html>