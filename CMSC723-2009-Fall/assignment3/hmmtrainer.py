import nltk, re, copy

# Get as many POS-tagged sentences from the 'news' category of the
# Brown corpus as requested
def get_pos_data(numsents):

    # Extract required number of sentences
    sentences = nltk.corpus.brown.tagged_sents(categories='news')[:numsents]

    # Initialize things
    sequences = []
    sequence = []
    symbols = set()
    tag_set = set()
    
    # A regular expression needed to clean up various tags
    tag_re = re.compile(r'[*]|--|[^+*-]+')

    # Go over each extracted sentence ...
    new_sentences = []
    for sentence in sentences:
        new_sentence = []
        for i in range(len(sentence)):
            word, tag = sentence[i]
            tag = tag_re.match(tag).group() # Clean up the tag.
            if not re.match(r'^[A-Z]+$|^[\.\,\(\)]$', tag):
                continue
            else:
                symbols.add(word)    # log this word                
                tag_set.add(tag)
                new_sentence.append((word, tag))  # store cleaned-up tagged token
        new_sentences.append(new_sentence)
        
    # Return sentences, the list of tags and all the words that we saw
    return new_sentences, list(tag_set), list(symbols)

# Train the tranition and emission probabilities
def train():
    print 'Training HMM...'

    # Use the first 1000 sentences from the 'news' category of the Brown corpus
    labelled_sequences, states, symbols = get_pos_data(1000)
    
    # Define the estimator to be used for probability computation
    estimator = lambda fd, bins: nltk.LidstoneProbDist(fd, 0.1, bins)
    
    # count occurences of starting states, transitions out of each state
    # and output symbols observed in each state
    freq_starts = nltk.FreqDist()
    freq_transitions = nltk.ConditionalFreqDist()
    freq_emissions = nltk.ConditionalFreqDist()
    for sequence in labelled_sequences:
        lasts = None
        for token in sequence:
            state = token[1]
            symbol = token[0]
            if lasts == None:
                freq_starts.inc(state)
            else:
                freq_transitions[lasts].inc(state)
            freq_emissions[state].inc(symbol)
            lasts = state

            # update the state and symbol lists
            if state not in states:
                states.append(state)
            if symbol not in symbols:
                symbols.append(symbol)

    # create probability distributions (with smoothing)
    N = len(states)
    starts = estimator(freq_starts, N)
    transitions = nltk.ConditionalProbDist(freq_transitions, estimator, N)
    emissions = nltk.ConditionalProbDist(freq_emissions, estimator, len(symbols))
                               
    # Return the transition and emissions probabilities along with 
    # the list of all the states and output symbols
    return starts, transitions, emissions, states, symbols
