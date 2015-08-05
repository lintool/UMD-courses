import sys
from nltk_contrib.fst import fst
import fsmutils

FST = fst.FST


# The English-Hindi number translation dictionary
translations = dict([(1, 'ek'), (2, 'do'), (3, 'teen'), (4, 'chaar'), (5, 'paanch'), (6, 'chaha'),\
                     (7, 'saat'), (8, 'aath'), (9, 'nau'), (10, 'das'), (11, 'gyarah'),\
                     (12, 'barah'), (13, 'terah'), (14, 'choudah'), (15, 'pandrah'), (16, 'saulah'),\
                     (17, 'satrah'), (18, 'attharah'), (19, 'unnees'), (20, 'bees')])


#####
# WRITE CODE HERE TO CREATE AS MANY FSTs AS YOU DEEM NECESSARY
# YOU MAY ALSO WRITE ANY SUPPORTING FUNCTIONS HERE, IF NEEDED.
#####

if __name__ == '__main__':
    # This 'for' loop allows you to iterate over each
    # number that's passed in from the standard input
    for number in sys.stdin:
        number = number.strip()
        #####
        # WRITE CODE HERE TO PRINT OUT THE TRANSLATION FOR number
        #####