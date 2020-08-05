# https://www.codewars.com/kata/simple-string-reversal
# In this Kata, we are going to reverse a string while maintaining the spaces (if any) in their original place.
#
# For example:
#
# solve("our code") = "edo cruo"
# -- Normal reversal without spaces is "edocruo".
# -- However, there is a space after the first three characters, hence "edo cruo"
#
# solve("your code rocks") = "skco redo cruoy"
# solve("codewars") = "srawedoc"

def solve(s):
    res = s[::-1].replace(' ', '')
    for i in (i for i, x in enumerate(s) if x.isspace()):
        res = res[:i] + ' ' + res[i:]
    return res
