import string, sys
from nltk_contrib.fst import fst
import fsmutils

FST = fst.FST

# Create fst instances
f1 = FST('soundex-generate')
f2 = FST('soundex-truncate')
f3 = FST('soundex-padzero')

#####
# WRITE CODE HERE TO POPULATE THE FST INSTANCES.
#####

if __name__ == '__main__':
    # This 'for' loop allows you to iterate over each
    # name that's passed in from the standard input
    for name in sys.stdin:
        name = name.strip()
        #####
        # WRITE CODE HERE TO PRINT OUT THE COMPOSED OUTPUT FOR name
        #####