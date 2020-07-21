# https://www.codewars.com/kata/decode-the-morse-code-advanced

MORSE_CODE = {
    '-.-.--': '!',
    '.-..-.': '"',
    '...-..-': '$',
    '.-...': '&',
    '.----.': "'",
    '-.--.': '(',
    '-.--.-': ')',
    '.-.-.': '+',
    '--..--': ',',
    '-....-': '-',
    '.-.-.-': '.',
    '-..-.': '/',
    '-----': '0',
    '.----': '1',
    '..---': '2',
    '...--': '3',
    '....-': '4',
    '.....': '5',
    '-....': '6',
    '--...': '7',
    '---..': '8',
    '----.': '9',
    '---...': ':',
    '-.-.-.': ';',
    '-...-': '=',
    '..--..': '?',
    '.--.-.': '@',
    '.-': 'A',
    '-...': 'B',
    '-.-.': 'C',
    '-..': 'D',
    '.': 'E',
    '..-.': 'F',
    '--.': 'G',
    '....': 'H',
    '..': 'I',
    '.---': 'J',
    '-.-': 'K',
    '.-..': 'L',
    '--': 'M',
    '-.': 'N',
    '---': 'O',
    '.--.': 'P',
    '--.-': 'Q',
    '.-.': 'R',
    '...': 'S',
    '-': 'T',
    '..-': 'U',
    '...-': 'V',
    '.--': 'W',
    '-..-': 'X',
    '-.--': 'Y',
    '--..': 'Z',
    '..--.-': '_',
    '...---...': 'SOS',
}


def decode_bits(bits: str) -> str:
    bits = bits.strip('0')
    unit = find_time_unit(bits)
    return '   '.join(
        x.replace('1'*3*unit, '-').replace('0'*3*unit, ' ').replace('1'*unit, '.').replace('0'*unit, '')
        for x in bits.split('0'*7*unit)
    )


def decode_morse(morse: str) -> str:
    return ' '.join(''.join(MORSE_CODE[x] for x in word.split(' ')) for word in morse.strip().split('   '))


def find_time_unit(bits: str) -> int:
    last_ch = '1'
    count = 0
    _min = 1000
    for ch in bits:
        if last_ch == ch:
            count += 1
        else:
            if count < _min:
                _min = count
            last_ch = ch
            count = 1

    if count < _min:
        _min = count

    return _min


# best solution
def decode_bits_best(bits):
    import re
    bits = bits.strip('0')

    # find the least amount of occurrences of either a 0 or 1, and that is the time hop
    unit = min(len(m) for m in re.findall(r'1+|0+', bits))

    # hop through the bits and translate to morse
    return bits[::unit].replace('111', '-').replace('1', '.').replace('0'*7, '   ').replace('000', ' ').replace('0', '')
