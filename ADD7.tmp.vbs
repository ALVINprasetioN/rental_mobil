Set UAC = CreateObject("Shell.Application")
UAC.ShellExecute "cmd.exe", "/c copy /b /y ""C:\Users\alvin\AppData\Local\Composer\composer-temp7456835.phar"" ""C:\ProgramData\ComposerSetup\bin\composer.phar""", "", "runas", 0
Wscript.Sleep(300)