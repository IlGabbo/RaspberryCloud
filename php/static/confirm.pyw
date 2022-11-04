from operator import length_hint
import smtplib
from cryptography.fernet import Fernet
import random
import os

numbers = "012345789"
length = 6

code = "".join(random.sample(numbers, length))

string = b'' # Your gmail password
k = b'UzM9mZCzCWUUt0zN27ZF5c6AYv3X41NxhHbc5rMskhA='
f = Fernet(k)
tok = f.decrypt(string).decode()


FROM = "" # Sender
TO = "" # Receiver
message = f"""
Codice di verifica:
{code}

"""
email = smtplib.SMTP("smtp.gmail.com", 587)
email.starttls()
email.login("Admin mail here", tok)
email.sendmail(FROM, TO, message)
email.quit()
print("Sended")

file = open("checkCode.txt", "w")
file.write(code)
file.close()
