# https://www.codewars.com/kata/crack-the-pin

from hashlib import md5


def crack(hash):
    for x in range(100000):
        s = f"{x:05d}"
        if hash == md5(s.encode()).hexdigest():
            return s