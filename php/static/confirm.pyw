from operator import length_hint
import smtplib
from cryptography.fernet import Fernet
import random
import os

numbers = "012345789"
length = 6

code = "".join(random.sample(numbers, length))

string = b'gAAAAABjEMiBV5FhJuh-y1moFVz1WzKtLkHc4UQRbQnHDYze6HmZQxo_qpFlP8UDTTqAbo49C_l93_gOoiiYOVGe1emqlFtNzqQNGv4gQXllN32hGfQb18k='
k = b'UzM9mZCzCWUUt0zN27ZF5c6AYv3X41NxhHbc5rMskhA='
f = Fernet(k)
tok = f.decrypt(string).decode()


FROM = "mancinigabriele685@gmail.com"
TO = "f.mancini.gabriele@gmail.com"
message = f"""
Codice di verifica:
{code}

"""
email = smtplib.SMTP("smtp.gmail.com", 587)
email.starttls()
email.login("mancinigabriele685@gmail.com", tok)
email.sendmail(FROM, TO, message)
email.quit()
print("Sended")

file = open("checkCode.txt", "w")
file.write(code)
file.close()