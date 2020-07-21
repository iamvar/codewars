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
