import os, sys

# This function returns fn o ... o f3 o f2 o f1 (input)
# where ALL transducers use characters as input symbols
def composechars(input, *fsts):
    for fst in fsts:
        try: 
            input1 = tuple(input)
            input = ''.join(fst.transduce(input1))
        except:
            sys.stderr.write('Error: Could not perform composition.\n')
            return ''
    return input

# This function returns returns fn o ... o f3 o f2 o f1 (input)
# where transducers use words as input symbols
def composewords(input, *fsts):
    for fst in fsts:
        try:
            input1 = list(input)
            input = fst.transduce(input1)
        except:
            sys.stderr.write('Error: Could not perform composition.\n')
            return ''
    return ' '.join(input)

# This function allows you to trace the path through
# transducer f with the given input
def trace(f, input):
    input = tuple(input)
    try:
        for step in f.step_transduce(input):
            arc = step[1][0]
            info = f.arc_info(arc)
            input = ''.join(info[2])
            output = ''.join(info[3])
            if not input:
                input = ' '
            if not output:
                output = ' '
            print info[0], '->', info[1], '(', input, ':', output, ')'
    except:
        return

