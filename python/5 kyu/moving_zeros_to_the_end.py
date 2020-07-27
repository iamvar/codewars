# https://www.codewars.com/kata/moving-zeros-to-the-end
# Write an algorithm that takes an array and moves all of the zeros to the end, preserving the order of the other elements.
# move_zeros([false,1,0,1,2,0,1,3,"a"]) returns[false,1,1,2,1,3,"a",0,0]


def move_zeros(array: list) -> list:
    return sorted([x if x != 0 or x is False else 0 for x in array], key=lambda x: x is 0)


# initially wanted something like this
def move_zeros_init(array):
    return sorted(array, key=lambda x: x == 0 and x is not False)
#
# but one of test examples stated
# move_zeros([9,0.0,0,9,1,2,0,1,0,1,0.0,3,0,1,9,0,0,0,0,9]) returns [9,9,1,2,1,1,3,1,9,9,0,0,0,0,0,0,0,0,0,0]
# however both passed the test
