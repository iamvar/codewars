# https://www.codewars.com/kata/snail
#
# Given an n x n array,
# return the array elements arranged from outermost elements to the middle element, traveling clockwise.
# array = [[1,2,3],
#          [4,5,6],
#          [7,8,9]]
# snail(array) #=> [1,2,3,6,9,8,7,4,5]

def snail(map):
    if len(map) <= 1:
        return next(iter(map), [])
    return map.pop(0) + [row.pop() for row in map] + map.pop()[::-1] + [row.pop(0) for row in map[::-1]] + snail(map)
