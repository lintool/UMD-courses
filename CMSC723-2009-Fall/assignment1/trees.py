#!/usr/bin/env python

import sys

# Define a node class. Each node has a name and a parent.
class Node:
    def __init__(self, name):
        self.name = name
        self.parent = None
        self.children = []

    def __str__(self):
        return self.name

    def parentify(self, parent):
        self.parent = parent
        parent.children.append(self)

# Define a Tree class. A tree has:
# - A root node
# - A dictionary that hashes each node instance against the node name            
class Tree:
    
    # Create the tree with a list of nodes and the root.
    # Note that at this point the tree is empty and 
    # the user needs to call the 'connect()' method to
    # create the edges. 
    def __init__(self, nodelist, root):
        self.nodes = {}
        for nodename in nodelist:
            n = Node(nodename)
            self.nodes[nodename] = n
        self.root = self.nodes[root]

    # A helper method to easily look up nodes
    def __getitem__(self, nodename):
        if self._exists(nodename):
            return self.nodes[nodename]

    # A helper method to check whether a particular node exists in the tree
    def _exists(self, nodename):
        return nodename in self.nodes

    # Make connections between the various nodes in the tree.
    # The input is a list of strings of the form 'n1->n2' where
    # 'n1' and 'n2' are node names of nodes already existing in the tree
    # and n2 is n1's parent.
    def connect(self, connections):
        for pair in connections:
            nodename, parentname = pair.split('->')
            if not self._exists(nodename):
                sys.stderr.write('Error: Node %s does not exist in the tree and cannot be connected.\n' % nodename)
            elif not self._exists(parentname):
                sys.stderr.write('Error: Node %s does not exist in the tree and cannot be connected.\n' % parentname)
            else:
                n = self[nodename]
                p = self[parentname]
                n.parentify(p)


    #######################
    # NEW METHODS GO HERE #
    #######################
    
