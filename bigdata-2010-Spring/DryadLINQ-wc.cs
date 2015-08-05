//
// (c) 2009 Microsoft Corporation.  All rights reserved.
//

using System;
using System.IO;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using LinqToDryad;

namespace Histogram
{
    public struct Pair
    {
        private string word;
        private int count;
        public Pair(string w, int c)
        {
            word = w;
            count = c;
        }
        public int Count { get { return count; } }
        public string Word { get { return word; } }
        public override string ToString()
        {
            return word + ":" + count.ToString();
        }
    }

    public class Program
    {
        public static IQueryable<Pair> BuildHistogram(
                            string directory,
                            string fileName,
                            int k)
        {
            string uri = DataPath.FileUriPrefix + Path.Combine(directory, fileName);
            PartitionedTable<LineRecord> inputTable = PartitionedTable.Get<LineRecord>(uri);

            IQueryable<string> words = inputTable.SelectMany(x => x.line.Split(' '));
            IQueryable<IGrouping<string, string>> groups = words.GroupBy(x => x);
            IQueryable<Pair> counts = groups.Select(x => new Pair(x.Key, x.Count()));
            IQueryable<Pair> ordered = counts.OrderByDescending(x => x.Count);
            IQueryable<Pair> top = ordered.Take(k);

            return top;
        }

        static void Main(string[] args)
        {
            IQueryable<Pair> results = BuildHistogram(@"C:\Users\jjlin\Desktop\", "InputParts.pt", 100);
            foreach (Pair words in results)
                Console.WriteLine(words.ToString());

            Console.WriteLine("Press enter to continue ...");
            Console.ReadLine();
            return;
        }
    }
}
